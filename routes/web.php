<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CourseConteroller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Models\Students;


Route::get('/', function () {
    return view('welcome');
});




// routing profil



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {

    //======dashboard route======
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');



// ======Student route======
Route::get('admin/student', [StudentController::class, 'index']);

// student create
Route::get('admin/student/create', [StudentController::class, 'create']);

// student store
Route::post('admin/student/store', [StudentController::class, 'store']);

// student edit
Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']);

// student update
Route::put('admin/student/update/{id}', [StudentController::class, 'update']);

// student delete
Route::delete('admin/student/delete/{id}', [StudentController::class, 'destroy']);


// ====== course route ======
Route::get('admin/course', [CourseConteroller::class, 'index']);

// course create
Route::get('admin/course/create', [CourseConteroller::class, 'create']);

// course store
Route::post('admin/course/store', [CourseConteroller::class, 'store']);

// course edit
Route::get('admin/course/edit/{id}', [CourseConteroller::class, 'edit']);

// course update
Route::put('admin/course/update/{id}', [CourseConteroller::class, 'update']);

// course delete
Route::delete('admin/course/delete/{id}', [CourseConteroller::class, 'destroy']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
