<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Make sure to use this
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable // Extend Authenticatable
{
    use HasFactory, Notifiable; // Include Notifiable if you need notifications

    protected $fillable = [
        'username', 'password', 'name', 'email', 'role'
    ];

    protected $hidden = [
        'password'
    ];
}
