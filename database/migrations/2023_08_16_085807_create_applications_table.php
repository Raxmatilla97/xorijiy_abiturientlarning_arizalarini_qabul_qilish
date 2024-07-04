<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('number_generation')->nullable(); // Arizani tekshirish uchun ishlatiladigan cod
            $table->string('fish'); // Familya ism sharifi
            $table->string('holat')->nullable(); // Ariza holati
            $table->string('passport_seriya'); // Passport seryasi
            $table->string('telefon'); // Telefoni
            $table->string('passport_number'); // Passport nomeri
            $table->string('passport_berilgan_sana'); // Passport berilgan sana
            $table->string('passport_kim_bergan'); // Passportni bergan idora nomi
            $table->text('father_about'); // Otasi haqida ma'lumot
            $table->text('mather_about'); // Onasi haqida ma'lumot
            $table->text('about_health'); // Sog'lig'i haqida
            $table->string('residence_to_passport'); // Fuqoroligi haqida
            $table->string('passport_file_upload');  // Passport nusxasini yuklasj
            $table->string('ignition_code'); // Ta'lim yo'nalishi shifri
            $table->string('ignition_name'); // Ta'lim yo'nalishi nomlanishi
            $table->string('educational_form'); // Ta'lim yo'nalishi shakli
            $table->string('brith_day'); // Tug'ulgan kun
            $table->string('brith_moth'); // Tug'ulgan oy
            $table->string('brith_year'); // Tug'ulgan yil
            $table->string('passport_place_info'); // Tug'ulgan joy nomi
            $table->string('gender'); // Jinsi
            $table->string('education_level'); // Ma'lumoti (o'rta maxsus, bakalvr, oliy)
            $table->string('education_level_file'); // Ma'lumotliligini tasdiqlovchi xujjat
            $table->string('lang_prompt'); // Suxbatni qaysi tilda olib borish bo'yicha

            $table->string('name_of_educational'); // Ta’lim muassasasining nomi
            $table->string('year_of_educational'); // Ta’lim muassasasida nechanchi yilda bitirganligi
            $table->string('direction_of_educational'); // Ta’lim muassasasida qaysi yo'nalishni bitirganligi
            $table->string('seriya_of_educational'); // Ta’lim muassasasida yo'nalish seriyasi
            $table->string('number_of_educational'); // Ta’lim muassasasida yo'nalish raqami
            $table->string('language_i_know'); // Qaysi tillarnio bilishi
            $table->string('my_language_level'); // Qaysi darajada bilishi
            $table->text('where_i_worked'); // Qayerda ishlaganligi

            $table->unsignedBigInteger('tekshirgan_user_id')->nullable(); // Arizani tekshirgan user
            $table->timestamps();
            $table->foreign('tekshirgan_user_id')->references('id')->on('users');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
