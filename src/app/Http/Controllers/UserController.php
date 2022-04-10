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
    # ユーザー詳細画面
    public function show(User $user)
    {
        // ユーザーのIDと掲示板のuser_idが一致するものを投稿日時が新しい順（降順）に取得
        $bulletins = Bulletin::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(10, ['*'], 'bulletins');
        // ユーザーがいいねした掲示板を日時が新しい順（降順）に取得
        $like_bulletins = $user->likes()->withPivot('created_at AS joined_at')->orderBy('joined_at', 'desc')->paginate(10, ['*'], 'like_bulletins');

        return view('users.show', compact('user', 'bulletins', 'like_bulletins'));
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

        // プロフィール画像の変更があった場合
        if ($request->profile_image != null) {
            // storeメソッドで一意のファイル名を自動生成しつつstorage/app/public/profilesに保存し、そのファイル名（ファイルパス）を$profileImagePathとして生成
            $profileImagePath = $request->profile_image->store('public/profiles');
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
}
