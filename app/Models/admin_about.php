<?php





namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class admin_about extends Model
{
    protected $table = 'admin_abouts'; // Ensure the table name is correct

    protected $fillable = [
       'name', 'profession', 'profession_description', 'journey', 'skill_1_name', 'skill_1_description',
        'skill_2_name', 'skill_2_description', 'skill_3_name', 'skill_3_description', 'skill_4_name',
        'skill_4_description', 'skill_5_name', 'skill_5_description', 'my_approach', 'lets_connect',
        'dob', 'age', 'website', 'email', 'degree', 'phone', 'city', 'freelance' ,     'first_language_name',
        'first_language_pct',
        'second_language_name',
        'second_language_pct',
        'third_language_name',
        'third_language_pct',
        'fourth_language_name',
        'fourth_language_pct',
        'first_education_title',
        'first_education_description',
        'second_education_title',
        'second_education_description',
        'third_education_title',
        'third_education_description',
    ];
}
