<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_portfolio extends Model
{
    use HasFactory;

protected $table='admin_portfolios';
    protected $fillable = ['img', 'language_name', 'description', 'url'];
}
