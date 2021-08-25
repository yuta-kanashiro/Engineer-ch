<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    // いいねする
    public function store($id)
    {
        // ログイン中のユーザー
        $loginUser = Auth::user();
        // いいね対象の掲示板ID
        $likeBulletinId = $id;

        // すでにいいね済みではないか？
        $existing = $loginUser->isLike($likeBulletinId);

        // いいね済みではない場合、いいね
        if (!$existing){
            $loginUser->like($likeBulletinId);
            return back();
        }
    }

    // いいねを外す
    public function destroy($id)
    {
        // ログイン中のユーザー
        $loginUser = Auth::user();
        // いいね対象の掲示板ID
        $likeBulletinId = $id;

        // すでにいいね済みではないか？
        $existing = $loginUser->isLike($likeBulletinId);

        // いいね済みの場合、いいねを外す
        if ($existing){
            $loginUser->unlike($likeBulletinId);
            return back();
        }
    }
}
