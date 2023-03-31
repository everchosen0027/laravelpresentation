<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentInfoController;
use App\Models\StudentInfo;
use App\Http\Controllers\EnrolledSubjectsController;
use App\Models\EnrolledSubjects;
use App\Http\Controllers\GradesController;
use App\Models\Grades;

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

Route::get('/addstudent',[StudentInfoController:: class, 'index']);
Route::get('/addsubject',[EnrolledSubjectsController:: class, 'index']);
Route::get('/addgrade',[GradesController:: class, 'index']);

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

Route::delete('/students/delete/{subjno}', [EnrolledSubjectsController::class, 'destroy'])
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

Route::get('/grade/{subjno}', [GradesController::class, 'show']) 
   ->middleware(['auth', 'verified'])
   ->name('grade-show');

Route::delete('/grade/delete/{subjno}', [GradesController::class, 'destroy']) 
   ->middleware(['auth', 'verified'])
   ->name('grade-delete');

Route::get('/grade/edit/{subjno}', [GradesController::class, 'edit']) 
   ->middleware(['auth', 'verified'])
   ->name('grade-edit');

Route::patch('/grade/update/{subjno}', [GradesController::class, 'update']) 
   ->middleware(['auth', 'verified'])
   ->name('grade-update');

require __DIR__.'/auth.php';
