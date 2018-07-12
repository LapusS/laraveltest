<?php

namespace App\Policies;

use App\Undefined;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    public function destroy (User $user, Undefined $task)
    {
        return $user->id === $task->user_id;
    }
}
