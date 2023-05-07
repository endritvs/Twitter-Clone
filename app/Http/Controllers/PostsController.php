<?php

namespace App\Http\Controllers;

use App\Events\NewPost;
use App\Models\Posts;
use App\Http\Requests\StorePostsRequest;
use App\Http\Requests\UpdatePostsRequest;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

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
        return response()->json(['likeCount' => $likeCount]);
    }

    public function dislike(Posts $post)
    {
        $user = auth()->user();

        if (!$post->likedBy($user)) {
            return response()->json(['message' => 'You have not liked this post'], 422);
        }

        $post->likes()->where('user_id', $user->id)->delete();

        $likeCount = $post->likes()->count();
        return response()->json(['message' => 'Post disliked', 'like_count' => $likeCount]);
    }
}
