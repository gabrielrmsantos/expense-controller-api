<?php

namespace App\Policies;

use App\Models\Expense;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ExpensePolicy
{

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Expense $expense): Response
    {
        return $user->id === $expense->user_id ?
            Response::allow() :
            Response::deny('This action can only be performed on your own expenses');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Expense $expense): Response
    {
        return $user->id === $expense->user_id ?
            Response::allow() :
            Response::deny('This action can only be performed on your own expenses');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Expense $expense): Response
    {
        return $user->id === $expense->user_id ?
            Response::allow() :
            Response::deny('This action can only be performed on your own expenses');
    }
}
