<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_official_account extends Model
{
    use HasFactory;
    protected $table = 'admin_official_accounts';
    protected $fillable = ['url', 'icon_first_name', 'icon_second_name', 'name'];
}
