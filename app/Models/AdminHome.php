<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminHome extends Model
{
    use HasFactory;
    protected $table = "admin_homes";
    protected $fillable = ["Name", "F_letter", "Skip_F_letter", "Profession_1", "Profession_2", "Profession_3", "Descreption", "Cv", "ProfieImage"];
}

