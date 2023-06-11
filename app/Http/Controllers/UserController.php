<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Followers;
use App\Models\Notifications;
use App\Models\Posts;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function imageUpload(Request $request)
    {
        if ($request->hasFile('profile_pic')) {
            $user = $request->user(); 
            $filePath = Storage::disk('public')->put('images/users', $request->file('profile_pic'));
            $user->profile_pic = $filePath;
            $user->save();
        }
        return redirect()->back();
    }

    public function bgUpload(Request $request)
    {
        if ($request->hasFile('bg_profile')) {
            $user = $request->user(); 
            $filePath = Storage::disk('public')->put('images/users/bg', $request->file('bg_profile'));
            $user->bg_profile = $filePath;
            $user->save();
        }
        return redirect()->back();   
    }
    
    public function follow(User $user)
    {
        $userAuthenticated = User::findOrFail(Auth::user()->id);
        $userAuthenticated->following()->syncWithoutDetaching($user->id);
        date_default_timezone_set('Europe/Belgrade'); 
        Notifications::create([
            'notification_message' => Auth::user()->name.' started following you!',
            'notification_type' => 'Follow',
            'user_id' => $user->id,
            'from' => Auth::user()->id,
            'created_at'=>Carbon::now()
        ]);
    
        return response()->json(['success' => true]);
    }
    
    public function unfollow(User $user)
    {
        $userAuthenticated = User::findOrFail(Auth::user()->id);
        $userAuthenticated->following()->detach($user->id);
        $existingNotification = Notifications::where('notification_message', Auth::user()->name.' started following you!')
        ->where('notification_type', 'Follow')
        ->where('user_id', $user->id)
        ->first();
        $existingNotification->delete();
        return response()->json(['success' => true]);
    }

    public function addFollowers()
    {
        $userId = auth()->id();
    
        $friends = Followers::where('follower_id', $userId)->pluck('user_id')->toArray();
    
        $users = User::whereNotIn('id', array_merge([$userId], $friends))
        ->whereDoesntHave('followers', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->limit(5)
        ->get();
    
        return view('dashboard', compact('users'));
    }

    public function addMoreFollowers()
    {
        $userId = auth()->id();
    
        $friends = Followers::where('follower_id', $userId)->pluck('user_id')->toArray();
    
        $users = User::whereNotIn('id', array_merge([$userId], $friends))
        ->whereDoesntHave('followers', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->paginate(10);
    
        return view('followers.index', compact('users'));
    }

    public function posts()
    {
        $userId = auth()->id();
    
        $posts = Posts::with(['user', 
        'bookmarks'=> function ($q) use ($userId){
            $q->where('user_id',$userId);
        }
        ,'likes' => function ($query) use ($userId) {
                        $query->where('user_id', $userId);
                    }])
                    ->withCount('likes')
                    ->whereIn('user_id', function ($query) use ($userId) {
                        $query->select('user_id')
                              ->from('followers')
                              ->where('follower_id', $userId)
                              ->orWhere('user_id', $userId);
                    })
                    ->orWhere('user_id', $userId) 
                    ->latest() 
                    ->get();
    
        $posts->each(function ($post) use ($userId) {
            $post['liked'] = $post->likes->contains('user_id', $userId);
        });

        $perPage = 10;
        $currentPage = request()->query('page', 1);
    
        $pagedData = $posts->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $posts = new LengthAwarePaginator($pagedData, $posts->count(), $perPage);
        $posts->setPath(request()->url());
    
        return response()->json($posts);
    }
    
    public function profile()
    {
        $userId = auth()->id();
        $followers =  Followers::where('follower_id', $userId)->count();
        $following = Followers::where('user_id', $userId)->count();
        $countPosts = Posts::with('user')
        ->where('user_id', $userId)
        ->orderBy('created_at', 'desc')
        ->count();

        return view('profile.profile', compact('followers', 'following','countPosts'));
    }

    public function myFollowers()
    {
        $userId = auth()->id();
        $followers = Followers::with('follower:id,name,email,profile_pic')->where('user_id', $userId)->paginate(10);
        return view('userFollowing.index',compact('followers'));
    }

    public function myFollowing()
    {
        $userId = auth()->id();
        $following = Followers::with('user:id,name,email,profile_pic')->where('follower_id', $userId)->paginate(10);
        return view('userFollowers.index',compact('following'));
    }

    public function userPosts()
    {
        $userId = auth()->id();
        $cacheKey = 'posts-' . $userId;
    
        $posts = Cache::remember($cacheKey, 60, function () use ($userId) {
            return Posts::with(['user', 'likes'])
                ->withCount('likes')
                ->where('user_id', $userId)
                ->orderBy('created_at', 'desc')
                ->get();
        });
    
        $posts->each(function ($post) use ($userId) {
            $post['liked'] = $post->likes->contains('user_id', $userId);
        });
    
        $perPage = 10;
        $currentPage = request()->query('page', 1);
    
        $pagedData = $posts->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $posts = new LengthAwarePaginator($pagedData, $posts->count(), $perPage);
        $posts->setPath(request()->url());
    
        return response()->json($posts);
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $results = DB::table('information_schema.tables')
            ->where('table_schema', config('database.connections.mysql.database'))
            ->where('table_type', 'BASE TABLE')
            ->select('table_name')
            ->get();

        $tables = [];

        foreach ($results as $result) {
            $table = $result->table_name;
            $query = DB::table($table);

            $columns = Schema::getColumnListing($table);

            foreach ($columns as $column) {
                $query->orWhere($column, 'like', '%' . $searchTerm . '%');
            }

            $searchResults = $query->get();

            if (count($searchResults)) {
                $tables[$table] = $searchResults;
            }
        }

        return view('explore.index', compact('tables', 'searchTerm'));
    }

}
