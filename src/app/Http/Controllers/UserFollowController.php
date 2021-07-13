<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserFollowController extends Controller
{
    // フォローする
    public function store($id)
    {
        // ログイン中のユーザー
        $loginUser = Auth::user();
        // フォロー対象のユーザーID
        $followUserId = $id;

        // すでにフォロー済みではないか？
        $existing = $loginUser->isFollowing($followUserId);
        // フォローする相手がユーザ自身ではないか？
        $myself = $loginUser->id == $followUserId;
        // ddd($myself);

        // フォロー済みではない、かつフォロー相手がユーザ自身ではない場合、フォロー
        if (!$existing && !$myself) {
            $loginUser->follow($followUserId);
            return back();
        }else{
            echo 'フォローできません';
        }
    }
    // フォローを外す
    public function destroy($id)
    {
        // ログイン中のユーザー
        $loginUser = Auth::user();
        // フォロー対象のユーザーID
        $followUserId = $id;

        // すでにフォロー済みではないか？
        $existing = $loginUser->isFollowing($followUserId);
        // フォローする相手がユーザ自身ではないか？
        $myself = $loginUser->id === $followUserId;

        // すでにフォロー済み、かつフォロー相手がユーザ自身ではない場合、フォローを外す
        if ($existing && !$myself) {
            $loginUser->unfollow($followUserId);
            return back();
        }
    }

    public function followings($id)
    {
        $user = User::find($id);
        $followingUsers = $user->followings()->withPivot('created_at AS joined_at')->orderBy('joined_at','desc')->get();

        return view('follow.followings_list', compact('followingUsers', 'user'));
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followerUsers = $user->followers()->withPivot('created_at AS joined_at')->orderBy('joined_at','desc')->get();

        return view('follow.followers_list', compact('followerUsers', 'user'));
    }

    // public function followList($id)
    // {
    //     $user = User::find($id);
    //     $followingUsers = $user->followings()->withPivot('created_at AS joined_at')->orderBy('joined_at','desc')->get();
    //     $followerUsers = $user->followers()->withPivot('created_at AS joined_at')->orderBy('joined_at','desc')->get();

    //     return view('follow.follow_list', compact('followingUsers', 'followerUsers', 'user'));
    // }
}
