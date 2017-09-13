<?php

Route::group(['middleware' => ['web']], function (){

    Route::get('/timeline/{user_id}', [
        'uses' => 'affenpilot\timeline\Controllers\TimelineController@getTimeline',
        'as'    => 'timeline',
        'middleware' => 'auth'
    ]);

    Route::get('/delete-post/{post_id}', [
        'uses' => 'affenpilot\timeline\Controllers\PostController@getDeletePost',
        'as' => 'post.delete',
        'middleware' => 'auth'
    ]);

    Route::post('createpost/{user_id}', [
        'uses' => 'affenpilot\timeline\Controllers\PostController@postCreatePost',
        'as' => 'post.create',
        'middleware' => 'auth'
    ]);
});
