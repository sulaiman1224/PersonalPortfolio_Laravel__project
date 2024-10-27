<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_service extends Model
{
    use HasFactory;


    protected $table = 'admin_services';
    protected $fillable = [
        'name','icon_name','description'
    ];
}
