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
        'educational_form',
        'passport_place_info',
        'gender',
        'education_level',
        'education_level_file',

        // 20
    ];

    protected $dates = ['deleted_at'];

    protected $table = "applications";
}
