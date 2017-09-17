<?php

namespace Affenpilot\Timeline\Controllers;

use App\Http\Controllers\Controller;
use Affenpilot\Timeline\Models\Post;
use App\User;

class TimelineController extends Controller
{
    /**
     * @param $user_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getTimeline($user_id)
    {
        return view('timeline::timeline', [
            'currentUser'  => $this->getCurrentUser($user_id),
            'posts'        => $this->getPostsByTimelineUser($user_id)
        ]);
    }

    /**
     * @param $user_id
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    protected function getCurrentUser($user_id)
    {
        return User::where('id', $user_id)->first();
    }

    /**
     * @param $user_id
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    protected function getPostsByTimelineUser($user_id)
    {
        return Post::where('timeline_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
