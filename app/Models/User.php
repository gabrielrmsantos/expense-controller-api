<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticable
{
    use HasApiTokens, Notifiable, HasFactory;

    protected $fillable = [
        'email', 'password', 'is_admin'
    ];

    protected $hidden = [
        'password'
    ];

    protected $defaults = [
        'is_admin' => false
    ];

    public function expenses(): HasMany {
        return $this->hasMany(Expense::class);
    }
}
