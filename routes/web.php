<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Auth;

// Arizalarni yuborish sahifasi
Route::get('/', [ApplicationController::class, 'arizalarniYuborish'])->name('site');

// Ro'yxatdan o'tganlik haqida habar va ID kod beradigan qism
Route::get('/confirm', function () {
    return view('confirm');
})->name('confirm');

// Talabalardan kelib tushgan arizlalarni listi
Route::post('/kelgan', [ApplicationController::class, 'store'])->name('kelgan_arizalar_store');

// Ariza holatini tekshirish
Route::post('/arizani-tekshirish', [ApplicationController::class, 'arizaniTekshirish'])->name('arizani-tekshirish');

// Ariza holatini tekshirish
Route::get('/arizani-javobi', function () {
    return view('javob');
})->name('arizani-javobi');

//  Yuklangan fayllarni saqalash routeri
Route::post('/tmp-upload', [TestController::class, 'tmpUpload']);


/*
|--------------------------------------------------------------------------
| Boshqaruv panelini routerlari
|--------------------------------------------------------------------------    
*/

    Route::middleware(['auth', 'verified'])->group(function () {

        Route::middleware(['auth', 'check.user:1'])->group(function () {
            // Adminlarni routeri
            Route::get('/dashboard/admin-register', function () {
                return view('auth.register');
            })->name('admin-register'); 

            // Adminlar ro'yxati
            Route::get('/dashboard/adminlar', [ApplicationController::class, 'adminlar'])->name('adminlar');

            // Adminnni o'chirish routeri
            Route::delete('/dashboard/admin-delete/{id}', [ApplicationController::class, 'adminDelete'])->name('adminDelete');

            // Admin registratsiya qismi
            Route::post('/dashboard/admin-register', [ApplicationController::class, 'adminRegisterStore'])->name('admin-register-store');
        });

    
    
    Route::get('/dashboard', [ApplicationController::class, 'dashboard'])->name('dashboard');
    
    /*
    |------------------------------------------------------------------------------
    | Talabalardan kelgan arizalarni ko'rish va tahrirlash sahifalarini routerlari
    |------------------------------------------------------------------------------
    */

     // Talabalardan kelib tushgan arizlalarnini tahrirlash
     Route::post('/dashboard/kelgan-arizalarni-tahrirlash', [ApplicationController::class, 'tahrirlash'])->name('kelgan-arizalarni-tahrirlash');

     // Arizalarni qidirish
     Route::match(['GET', 'POST'], '/dashboard/arizalarni-qidirish', [ApplicationController::class, 'arizalarniQidrish'])->name('arizalarni-qidirish');

    // Talabalardan kelib tushgan arizlalarni listi
    Route::get('/dashboard/kelgan-arizalar', [ApplicationController::class, 'index'])->name('kelgan-arizalar');

    // Rad etilgan arizalar listi
    Route::get('/dashboard/rad-etilgan-arizalar', [ApplicationController::class, 'radEtilganArizalar'])->name('rad-etilgan-arizalar');

    // Maqullangan arizalar listi
    Route::get('/dashboard/maqullangan-arizalar', [ApplicationController::class, 'maqullanganArizalar'])->name('maqullangan-arizalar');

     // Ko'rilmagan arizalar listi
     Route::get('/dashboard/korilmagan-arizalar', [ApplicationController::class, 'korilmaganArizalar'])->name('korilmagan-arizalar');

    // Arizani ko'rish
    Route::get('/dashboard/arizani-korish/{id}', [ApplicationController::class, 'arizaniKorish'])->name('arizani-korish'); 

    // Talabalardan kelib tushgan arizlalarni ko'rish sahifasi
    Route::get('/dashboard/kelgan-arizalarni-korish', [ApplicationController::class, 'show'])->name('kelgan-arizalarni-korish');   

    // Talabalardan kelib tushgan arizlalarnini o'chirish
    Route::delete('/dashboard/kelgan-arizalarni-ochirish/{id}', [ApplicationController::class, 'destroy'])->name('kelgan-arizalarni-ochirish');

    /*
    |--------------------------------------------------------------------------
    | Boshqa boshqaruv routerlari
    |--------------------------------------------------------------------------    
    */

    // Route::get('/dashboard/pdf-down', function () {
    //     return view('pdf');
    // })->name('dashboard.pdf');

     // Arizani yuklab olish
     Route::get('/dashboard/pdf-yuklash/{id}', [ApplicationController::class, 'pdfYuklash'])->name('pdf-yuklash');

    // Route::get('/dashboard/ariza-qidirish', function () {
    //     echo "Ariza qidirish sahifasi bo'ladi!";
    // })->name('dashboard.ariza-qidirish');
});

/*
|------------------------------------------------------------------------------
| Profil routerlari
|------------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
