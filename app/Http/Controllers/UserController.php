<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Followers;
use App\Models\Posts;
use Illuminate\Http\Request;
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
        return response()->json(['success' => true]);
    }
    
    public function unfollow(User $user)
    {
        $userAuthenticated = User::findOrFail(Auth::user()->id);
        $userAuthenticated->following()->detach($user->id);
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
    
        $posts = Posts::with(['user', 'likes' => function ($query) use ($userId) {
                        $query->where('user_id', $userId);
                    }])
                    ->withCount('likes') // eager load the number of likes for each post
                    ->whereIn('user_id', function ($query) use ($userId) {
                        $query->select('user_id')
                              ->from('followers')
                              ->where('follower_id', $userId)
                              ->orWhere('user_id', $userId);
                    })
                    ->orWhere('user_id', $userId) // include your own posts
                    ->latest() // show the latest posts first
                    ->paginate(10);
    
        foreach ($posts as $post) {
            $post['liked'] = false;
            foreach ($post->likes as $like) {
                if ($like->user_id == $userId) {
                    $post['liked'] = true;
                    break;
                }
            }
        }
    
        return response()->json($posts);
    }
    
    
    
    
    

    public function profile()
    {
        $userId = auth()->id();
    
        $friends = Followers::where('follower_id', $userId)->pluck('user_id')->toArray();
        $followersCount = count($friends);
    
        $following = Followers::where('user_id', $userId)->pluck('follower_id')->toArray();
        $userPosts = Posts::with('user')
        ->where('user_id', $userId)
        ->orderBy('created_at', 'desc')
        ->get();
        $followingCount = count($following);
        $countPosts = count($userPosts);
        return view('profile.profile', compact('followersCount', 'followingCount','countPosts'));
    }

    public function userPosts()
    {
        $userId = auth()->id();
        $posts = Cache::remember('posts-' . $userId, 60, function () use ($userId) {
            return Posts::with('user')
                ->where('user_id', $userId)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            });
        return response()->json($posts);
    }
    
    

}
