<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Bulletin;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

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

    //掲示板編集における認可機能
    public function edit(User $user, Bulletin $request_bulletin)
    {
        return $user->id === $request_bulletin->user_id
                ? Response::allow()
                : Response::deny('このページを閲覧する権限はありません');
    }
}
