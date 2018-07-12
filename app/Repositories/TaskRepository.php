<?php
/**
 * Created by PhpStorm.
 * User: lapa
 * Date: 12.7.18
 * Time: 12.41
 */

namespace App\Repositories;

use App\User;

class TaskRepository
{
    /**
     * Получить все задачи заданного пользователя.
     *
     * @param  User  $user
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\HasMany[]
     */
    public function forUser(User $user)
    {
        return $user->undefined()
            ->orderBy('created_at', 'asc')
            ->get();
    }
}