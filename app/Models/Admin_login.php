<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // This extends the authenticatable user class
use Illuminate\Notifications\Notifiable;

class Admin_login extends Authenticatable
{
    use Notifiable;

    protected $table = 'admin_logins'; // Make sure this matches your table name

    // Fields that are mass assignable
    protected $fillable = ['username', 'email', 'password', 'image'];

    // Hash password when saving it to the database

}
