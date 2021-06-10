<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserPolicy
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

    //プロフィール、個人情報編集における認可機能
    public function edit(User $user, User $request_user)
    {
        return $user->id === $request_user->id
                ? Response::allow()
                : Response::deny('このページを見る権限はありません');
    }
}
