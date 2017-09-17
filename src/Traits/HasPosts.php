<?php

declare(strict_types=1);

namespace Affenpilot\Timeline;

use Affenpilot\Timeline\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasPosts
{
    /**
     * @return MorphMany
     */
    public function posts(): MorphMany
    {
        return $this->morphMany(Post::class, 'author');
    }

    /**
     * @param string $related
     * @param null   $foreignKey
     *
     * @return hasOne
     */
    public function timelinefrom(String $related, $foreignKey = null): hasOne
    {
        return $this->hasOne($related, $foreignKey);
    }

    /**
     * @param $user_id
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getTimeLineFromUser($user_id): Collection
    {
        return Post::where('timeline_id', $user_id)->get();
    }

    /**
     * @param string $body
     * @param Model  $author
     * @param Model  $timeline_from
     *
     * @return bool
     */
    public function createPost(String $body, Model $author, Model $timeline_from): bool
    {
        $post = (new Post())->forceFill([
            'body'          => $body,
            'author_id'     => $author->id,
            'author_type'   => get_class($author),
            'timeline_id'   => $timeline_from->id,
            'timeline_type' => get_class($timeline_from),
        ]);

        return (bool) $this->posts()->save($post);
    }
}
