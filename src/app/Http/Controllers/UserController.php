<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bulletin;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Http\Requests\UpdateUserInfomationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    # ユーザー詳細画面
    public function show(User $user)
    {
        // ユーザーのIDと掲示板のuser_idが一致するものを投稿日時が新しい順に取得
        $bulletins = Bulletin::where('user_id',$user->id)->orderBy('created_at','desc')->get();

        return view('users.show', compact('user', 'bulletins'));
    }

    # プロフィール編集画面
    public function edit(User $user)
    {
        // 認可機能（UserPolicy）
        $this->authorize('edit', $user);

        return view('users.edit_profile', compact('user'));
    }

    # プロフィール更新機能
    public function update(UpdateUserProfileRequest $request, $id)
    {
        // ログイン中のユーザの情報を取得し、$loginUserに代入
        $loginUser = Auth::user();
        // リクエストデータ （全て）を取得し、$userUpdateに代入
        $userUpdate = $request->all();
        // リクエストデータ（profile_image）を取得し、$profileImageに代入
        $profileImage = $request->profile_image;

        // プロフィール画像の変更があった場合
        if ($profileImage != null) {
            // storeメソッドで一意のファイル名を自動生成しつつstorage/app/public/profilesに保存し、そのファイル名をファイルパス（$profileImagePath）として生成
            $profileImagePath = $profileImage->store('public/profiles');
            // $userUpdateのprofile_imageカラムに$profileImagePath（ファイルパス）を保存
            $userUpdate['profile_image'] = $profileImagePath;
        }

        // $userUpdateのデータを受け取り、データベースへ保存
        $loginUser->fill($userUpdate)->save();

        return redirect()->route('user.show', Auth::user());
    }

    # 個人情報編集画面
    public function editInfomation($id)
    {
        $user = User::find($id);
        // 認可機能（UserPolicy）
        $this->authorize('edit', $user);

        return view('users.edit_infomation', compact('user', 'id'));
    }

    # 個人情報更新機能
    public function updateInfomation(UpdateUserInfomationRequest $request, $id)
    {
        // ログイン中のユーザの情報を取得し、$loginUserに代入
        $loginUser = Auth::user();
        // リクエストデータ（メールアドレス）を受け取り、データベースに保存
        $loginUser->fill($request->all());
        // リクエストデータからnew-passwordカラムを取得してハッシュ化し、$loginUserのpasswordカラムに代入
        $loginUser->password = bcrypt($request->get('new-password'));
        // データベースに保存（パスワード）
        $loginUser->save();

        return redirect()->route('user.show', Auth::user());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
