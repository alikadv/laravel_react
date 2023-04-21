<?php

Route::group(['namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Category
    Route::apiResource('categories', 'CategoryApiController');

    Route::get('/posts', 'HomeController@posts')->name('posts');

    // Post
    Route::post('posts/media', 'PostApiController@storeMedia')->name('posts.storeMedia');
    Route::apiResource('posts', 'PostApiController');
});
