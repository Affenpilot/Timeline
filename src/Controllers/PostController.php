<?php

namespace Affenpilot\Timeline\Controllers;

use Affenpilot\Timeline\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * @param Request $request
     * @param $user_id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postCreatePost(Request $request, $user_id)
    {
        $this->validate($request, [
            'body' => 'required|max:1000',
        ]);

        $request->user()->createPost(
            $request['body'],
            $request->user(),
            $request->user()->timelinefrom($request['_class'], 'id')->first()
        );

        return redirect()->route(
            'timeline',
            ['user_id' => $user_id]
        )->with(['message' => 'Post was successfully saved.']);
    }

    /**
     * @param $post_id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getDeletePost($post_id)
    {
        $post = Post::where('id', $post_id)->first();

        if (Auth::user() != $post->user) {
            return redirect()->back();
        }

        $post->delete();

        return redirect()->route(
            'timeline',
            ['user_id' => Auth::user()->id]
        )->with(['message' => 'Successfully deleted.']);
    }
}
