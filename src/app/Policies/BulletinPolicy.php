<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Bulletin;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class BulletinPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // 掲示板編集における認可機能
    public function edit(User $user, Bulletin $request_bulletin)
    {
        return $user->id === $request_bulletin->user_id
                ? Response::allow()
                : Response::deny('このページを閲覧する権限はありません');
    }

    // 掲示板（限定）詳細表示における認可機能
    public function show(User $user, Bulletin $bulletin)
    {
        $user = Auth::user();
        // その掲示板を投稿したユーザーはフォローしているユーザーか？
        $followingUser = $user->followings()->where('follower_id', $bulletin->user_id)->exists();
        // その掲示板を投稿したユーザーはログイン中のユーザーか？
        $loginUser = $user->id === $bulletin->user_id;

        // どちらか1つだけがtrueの場合にtrue
        return $followingUser || $loginUser
                ? Response::allow()
                : Response::deny($bulletin->user->name.'をフォローしているユーザーだけが閲覧可能です');
    }
}
