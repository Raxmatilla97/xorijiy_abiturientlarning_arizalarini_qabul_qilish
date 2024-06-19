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
        'pass_info',
        'telefon',
        'fakultet',
        'yonalish',
        'kurs_nomeri',
        'guruhi',
        'mezon',
        'document',
        'message',
        'tekshirgan_user_id',
    ];
   
    protected $dates = ['deleted_at'];

    protected $table = "applications";
}
