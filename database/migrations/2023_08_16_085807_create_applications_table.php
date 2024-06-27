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
            $table->string('father_about'); // Otasi haqida ma'lumot
            $table->string('mather_about'); // Onasi haqida ma'lumot
            $table->string('about_health'); // Sog'lig'i haqida
            $table->string('residence_to_passport'); // Fuqoroligi haqida
            $table->string('passport_file_upload');  // Passport nusxasini yuklasj
            $table->string('ignition_code'); // Ta'lim yo'nalishi shifri
            $table->string('educational_form'); // Ta'lim yo'nalishi nomlanishi
            $table->string('passport_place_info'); // Tug'ulgan joy nomi
            $table->string('gender'); // Jinsi
            $table->string('education_level'); // Ma'lumoti (o'rta maxsus, bakalvr, oliy)
            $table->string('education_level_file'); // Ma'lumotliligini tasdiqlovchi xujjat
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
