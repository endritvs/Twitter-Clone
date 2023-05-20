<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $bookmarks = Bookmark::with('user', 'tweet.likes')->where('user_id', $userId)->latest()->paginate(10);
    
        foreach ($bookmarks as $bookmark) {
            $bookmark->tweet['liked'] = false;
    
            foreach ($bookmark->tweet->likes as $like) {
                if ($like->user_id == $userId) {
                    $bookmark->tweet['liked'] = true;
                    break;
                }
            }
        }
        return view('bookmarks.index', compact('bookmarks'));
    }
    

    public function store(Request $request)
    {
        $tweetId = $request->post_id;
        $user = Auth::user();
        $bookmark = new Bookmark();
        $bookmark->post_id = $tweetId;
        $bookmark->user_id = $user->id;
        $bookmark->save();
        return response()->json(['message' => 'Bookmark created successfully']);
    }

    public function destroy($bookmark)
    {
        $getBookmark = Bookmark::where('user_id',auth()->user()->id)->where('post_id',$bookmark)->first();
        $getBookmark->delete();
        return response()->json(['message' => 'Bookmark deleted successfully']);
    }
}
