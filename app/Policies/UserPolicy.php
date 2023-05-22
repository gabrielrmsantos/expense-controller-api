<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return $user->is_admin ?
            Response::allow() :
            Response::deny('Only administrators can perform this action');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): Response
    {
        return $user->is_admin || $user->id === $model->id ?
            Response::allow() :
            Response::deny('You can only see your own user data');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return $user->is_admin ?
            Response::allow() :
            Response::deny('Only administrators can perform this action');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): Response
    {
        return $user->is_admin || $user->id === $model->id ?
            Response::allow() :
            Response::deny('You can only update your own user data');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): Response
    {
        return $user->is_admin ?
            Response::allow() :
            Response::deny('Only administrators can perform this action');
    }
}
