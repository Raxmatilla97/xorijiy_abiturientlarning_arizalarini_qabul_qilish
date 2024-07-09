<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'fish',
        'number_generation',
        'holat',
        'passport_seriya',
        'telefon',
        'passport_number',
        'passport_berilgan_sana',
        'passport_kim_bergan',
        'father_about',
        'mather_about',
        'about_health',
        'residence_to_passport',
        'tekshirgan_user_id',
        'passport_file_upload',
        'ignition_code',
        'ignition_name',
        'educational_form',
        'passport_place_info',
        'gender',
        'education_level',
        'education_level_file',
        'lang_prompt',
        'brith_day',
        'brith_moth',
        'brith_year',
        'name_of_educational',
        'year_of_educational',
        'direction_of_educational',
        'seriya_of_educational',
        'number_of_educational',
        'language_i_know',
        'where_i_worked',
        'message',

        // 30
    ];

    protected $dates = ['deleted_at'];

    protected $table = "applications";
}
