<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentInfoController;
use App\Http\Controllers\EnrolledSubjectsController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\BalancesController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//students
Route::get('/students/add', function () {
    return view('students.add');
})->middleware(['auth', 'verified'])->name('add-student');

Route::post('/students/add', [StudentInfoController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('student-store');

Route::get('/students', [StudentInfoController::class, 'index'])
->middleware(['auth', 'verified'])
->name('students');

Route::get('/students/{stuno}', [StudentInfoController::class, 'show'])
->middleware(['auth', 'verified'])
->name('students-show');

Route::delete('/students/delete/{stuno}', [StudentInfoController::class, 'destroy'])
->middleware(['auth', 'verified'])
->name('students-delete');

Route::get('/students/edit/{stuno}', [StudentInfoController::class, 'edit'])
->middleware(['auth', 'verified'])
->name('students-edit');

Route::patch('/students/update/{stuno}', [StudentInfoController::class, 'update'])
->middleware(['auth', 'verified'])
->name('students-update');

//enrolledsubjects
Route::get('/subjects/add', function () {
    return view('subjects.add');
})->middleware(['auth', 'verified'])->name('add-subjects');

Route::post('/subjects/add', [EnrolledSubjectsController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('subjects-store');

Route::get('/subjects', [EnrolledSubjectsController::class, 'index'])
->middleware(['auth', 'verified'])
->name('subjects');

Route::get('/subjects/{subjno}', [EnrolledSubjectsController::class, 'show'])
->middleware(['auth', 'verified'])
->name('subjects-show');

Route::delete('/subjects/delete/{subjno}', [EnrolledSubjectsController::class, 'destroy'])
->middleware(['auth', 'verified'])
->name('subjects-delete');

Route::get('/subjects/edit/{subjno}', [EnrolledSubjectsController::class, 'edit'])
->middleware(['auth', 'verified'])
->name('subjects-edit');

Route::patch('/subjects/update/{subjno}', [EnrolledSubjectsController::class, 'update'])
->middleware(['auth', 'verified'])
->name('subjects-update');

//grades
Route::get('/grade/add', function () {
    return view('grade.add');
})->middleware(['auth', 'verified'])->name('add-grade');

Route::post('/grade/add',[GradesController::class, 'store'] )
->middleware(['auth', 'verified'])
->name('grade-store');

Route::get('/grade', [GradesController::class, 'index']) 
   ->middleware(['auth', 'verified'])
   ->name('grade');

Route::get('/grade/{gradno}', [GradesController::class, 'show']) 
   ->middleware(['auth', 'verified'])
   ->name('grade-show');

Route::delete('/grade/delete/{gradno}', [GradesController::class, 'destroy']) 
   ->middleware(['auth', 'verified'])
   ->name('grade-delete');

Route::get('/grade/edit/{gradno}', [GradesController::class, 'edit']) 
   ->middleware(['auth', 'verified'])
   ->name('grade-edit');

Route::patch('/grade/update/{gradno}', [GradesController::class, 'update']) 
   ->middleware(['auth', 'verified'])
   ->name('grade-update');

   Route::get('/grade/add', [GradesController::class, 'getStudentInfo','add']) 
   ->middleware(['auth', 'verified'])
   ->name('add-grade');

   Route::get('/grade/add', [GradesController::class, 'getEnrolledSubjects'])
     ->middleware(['auth', 'verified'])
     ->name('add-grade');

//balances
Route::get('/balance/add', function () {
    return view('balance.add');
})->middleware(['auth', 'verified'])->name('add-balance');

Route::post('/balance/add',[BalancesController::class, 'store'] )
->middleware(['auth', 'verified'])
->name('balance-store');

Route::get('/balance', [BalancesController::class, 'index']) 
   ->middleware(['auth', 'verified'])
   ->name('balance');

Route::get('/balance/{balnum}', [BalancesController::class, 'show']) 
   ->middleware(['auth', 'verified'])
   ->name('balance-show');

Route::delete('/balance/delete/{balnum}', [BalancesController::class, 'destroy']) 
   ->middleware(['auth', 'verified'])
   ->name('balance-delete');

Route::get('/balance/edit/{balnum}', [BalancesController::class, 'edit']) 
   ->middleware(['auth', 'verified'])
   ->name('balance-edit');

Route::patch('/balance/update/{balnum}', [BalancesController::class, 'update']) 
   ->middleware(['auth', 'verified'])
   ->name('balance-update');

   Route::get('/balance/add', [BalancesController::class, 'getStudentInfo'])
   ->middleware(['auth', 'verified'])
   ->name('add-balance');

require __DIR__.'/auth.php';
