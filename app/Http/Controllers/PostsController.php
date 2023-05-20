<?php

namespace App\Http\Controllers;

use App\Events\NewPost;
use App\Models\Posts;
use App\Http\Requests\StorePostsRequest;
use App\Http\Requests\UpdatePostsRequest;
use App\Models\Like;
use App\Models\Notifications;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    public function store(StorePostsRequest $request)
    {
        $userId = Auth::user()->id;
        $post = new Posts();
        $post->content = $request->input('content');
        $post->user_id = $userId;
          // Handle image upload
        if ($request->hasFile('image')) {
            $filePath = Storage::disk('public')->put('postImages', $request->file('image'));
            $post->image = $filePath;
        }

        // Handle video upload
        if ($request->hasFile('video')) {
            $filePath = Storage::disk('public')->put('postVideos', $request->file('video'));
            $post->video = $filePath;
        }
    
        $post->save();

        $postWithUser = Posts::with(['user', 'likes' => function ($query) use ($userId) {
            $query->where('user_id', $userId);
        }])
            ->withCount('likes')->find($post->id);
        return response()->json($postWithUser);
    }

    /**
     * Display the specified resource.
     */
    public function show(Posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostsRequest $request, Posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $posts)
    {
        //
    }

    public function like(Posts $post)
    {
        if ($post->likes()->where('user_id', auth()->id())->exists()) {
            return response(null, 409); // Conflict response code
        }

        $like = new Like();
        $like->user_id = auth()->user()->id;
        $post->likes()->save($like);

        $likeCount = $post->likes()->count();

        date_default_timezone_set('Europe/Belgrade'); 
        Notifications::create([
            'notification_message' => Auth::user()->name.' liked your post!',
            'notification_type' => 'Like',
            'user_id' => $post->user->id,
            'from' => Auth::user()->id,
            'created_at'=>Carbon::now()
        ]);
        return response()->json(['likeCount' => $likeCount]);
    }

    public function dislike(Posts $post)
    {
        $user = auth()->user();

        if (!$post->likedBy($user)) {
            return response()->json(['message' => 'You have not liked this post'], 422);
        }
        
        $existingNotification = Notifications::where('notification_type', 'Like')
        ->where('user_id', $post->user_id)
        ->first();
        $existingNotification->delete();
        $post->likes()->where('user_id', $user->id)->delete();

        $likeCount = $post->likes()->count();
        return response()->json(['message' => 'Post disliked', 'like_count' => $likeCount]);
    }
}
