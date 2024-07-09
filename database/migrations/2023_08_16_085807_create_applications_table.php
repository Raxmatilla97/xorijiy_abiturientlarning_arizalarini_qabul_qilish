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
            $table->string('fish')->nullable(); // Familya ism sharifi
            $table->string('holat')->nullable(); // Ariza holati
            $table->string('passport_seriya')->nullable(); // Passport seryasi
            $table->string('telefon')->nullable(); // Telefoni
            $table->string('passport_number')->nullable(); // Passport nomeri
            $table->string('passport_berilgan_sana')->nullable(); // Passport berilgan sana
            $table->string('passport_kim_bergan')->nullable(); // Passportni bergan idora nomi
            $table->text('father_about')->nullable(); // Otasi haqida ma'lumot
            $table->text('mather_about')->nullable(); // Onasi haqida ma'lumot
            $table->text('about_health')->nullable(); // Sog'lig'i haqida
            $table->string('residence_to_passport')->nullable(); // Fuqoroligi haqida
            $table->string('passport_file_upload')->nullable();  // Passport nusxasini yuklasj
            $table->string('ignition_code')->nullable(); // Ta'lim yo'nalishi shifri
            $table->string('ignition_name')->nullable(); // Ta'lim yo'nalishi nomlanishi
            $table->string('educational_form')->nullable(); // Ta'lim yo'nalishi shakli
            $table->string('brith_day')->nullable(); // Tug'ulgan kun
            $table->string('brith_moth')->nullable(); // Tug'ulgan oy
            $table->string('brith_year')->nullable(); // Tug'ulgan yil
            $table->string('passport_place_info')->nullable(); // Tug'ulgan joy nomi
            $table->string('gender')->nullable(); // Jinsi
            $table->string('education_level')->nullable(); // Ma'lumoti (o'rta maxsus, bakalvr, oliy)
            $table->string('education_level_file')->nullable(); // Ma'lumotliligini tasdiqlovchi xujjat
            $table->string('lang_prompt')->nullable(); // Suxbatni qaysi tilda olib borish bo'yicha

            $table->string('name_of_educational')->nullable(); // Ta’lim muassasasining nomi
            $table->string('year_of_educational')->nullable(); // Ta’lim muassasasida nechanchi yilda bitirganligi
            $table->string('direction_of_educational')->nullable(); // Ta’lim muassasasida qaysi yo'nalishni bitirganligi
            $table->string('seriya_of_educational')->nullable(); // Ta’lim muassasasida yo'nalish seriyasi
            $table->string('number_of_educational')->nullable(); // Ta’lim muassasasida yo'nalish raqami
            $table->string('language_i_know')->nullable(); // Qaysi tillarnio bilishi
            $table->text('where_i_worked')->nullable(); // Qayerda ishlaganligi
            $table->text('message')->nullable(); // Arizaga habar


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
