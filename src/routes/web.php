<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// みんなの掲示板表示画面（トップページ）
Route::get('/', 'BulletinController@index');

Auth::routes();

# ログイン状態で使用可能
Route::group(['middleware' => 'auth'], function () {
    # ユーザー関連
    Route::group(['prefix' => '/user/{id}/'], function () {
        // 個人情報編集画面表示
        Route::get('edit_infomation', 'UserController@editInfomation')->name('edit_infomation');
        // 個人情報編集機能
        Route::patch('update_infomation', 'UserController@updateInfomation')->name('update_infomation');
        // フォロー機能
        Route::post('follow', 'UserFollowController@store')->name('follow');
        // アンフォロー機能
        Route::delete('unfollow', 'UserFollowController@destroy')->name('unfollow');
    });
    // プロフィール編集画面表示（edit）、プロフィール編集機能（update）
    Route::resource('user', 'UserController', ['only' => ['edit', 'update']]);

    # 掲示板関連
    Route::group(['prefix' => '/bulletin/{id}/'], function () {
        // コメント機能
        Route::post('add', 'CommentController@add')->name('add');
        // いいね機能
        Route::post('like', 'LikeController@store')->name('like');
        // いいね削除機能
        Route::delete('unlike', 'LikeController@destroy')->name('unlike');
    });
    // ともだちの掲示板表示画面
    Route::get('/limited-top', 'BulletinController@showLimited')->name('showLimited');
    // 投稿画面表示（create）、投稿機能（store）
    Route::resource('bulletin', 'BulletinController', ['only' => ['create', 'store', 'edit', 'update']]);

    # 検索機能
    Route::get('search', 'SearchController@search')->name('search');
});

# ゲスト状態で使用可能
// ユーザー詳細画面表示
Route::resource('user', 'UserController', ['only' => ['show']]);

Route::group(['prefix' => '/user/{id}/'], function () {
    // // フォロー、フォロワー一覧画面表示
    Route::get('follow_list', 'UserFollowController@followList')->name('follow_list');
});

// みんなの掲示板詳細画面表示
Route::resource('bulletin', 'BulletinController', ['only' => ['show']]);
