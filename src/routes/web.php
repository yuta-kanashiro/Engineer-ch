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

Route::get('/', 'BulletinController@index');

Auth::routes();

# ログイン状態で使用可能
Route::group(['middleware' => 'auth'], function () {
    # ユーザー関連
    // プロフィール編集画面表示（edit）、プロフィール編集機能（update）
    Route::resource('user', 'UserController', ['only' => ['edit', 'update']]);
    // 個人情報編集画面表示
    Route::get('/user/{id}/edit_infomation', 'UserController@editInfomation')->name('edit_infomation');
    // 個人情報編集機能
    Route::patch('/user/{id}/update_infomation', 'UserController@updateInfomation')->name('update_infomation');


});

# ゲスト状態で使用可能
// ユーザー詳細画面表示
Route::resource('user', 'UserController', ['only' => ['show']]);