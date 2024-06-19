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
            $table->string('number_generation')->nullable();
            $table->string('fish');
            $table->string('holat')->nullable();            
            $table->string('pass_info');
            $table->string('telefon');
            $table->string('fakultet');
            $table->string('yonalish');
            $table->string('kurs_nomeri');
            $table->string('guruhi');
            $table->string('mezon');
            $table->text('document')->nullable();
            $table->text('message')->nullable();
            $table->unsignedBigInteger('tekshirgan_user_id')->nullable();
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
