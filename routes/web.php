<?php

use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

/* Route::middleware('auth')->get('/', function () {
    return redirect()->to('/admin');
}); */

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });

    Route::resource('messages',MessagesController::class);

    Route::prefix('admin/')->middleware('role:admin')->group(function () {
        Route::get('/', Admin\HomeController::class)->name('admin.homepage');
        Route::get('home', Admin\HomeController::class)->name('admin.home');
        Route::get('dashboard', Admin\HomeController::class)->name('admin.dashboard');
        Route::get('student/{grade}/grade', [App\Http\Controllers\Admin\StudentController::class, 'byGrade'])->name('admin.grade.student');
        Route::get('teacher/{grade}/grade', [App\Http\Controllers\Admin\TeacherController::class, 'byGrade'])->name('admin.grade.teacher');
        Route::get('answer/{homework}/homework', [App\Http\Controllers\Admin\AnswerController::class, 'byHomework'])->name('admin.homework.answer');
        Route::get('homework/{grade}/grade', [App\Http\Controllers\Admin\HomeworkController::class, 'byGrade'])->name('admin.grade.homework');
        Route::resource('student', Admin\StudentController::class, ['as' => 'admin']);
        Route::resource('teacher', Admin\TeacherController::class, ['as' => 'admin']);
        Route::resource('grade', Admin\GradeController::class, ['as' => 'admin']);
        Route::resource('answer', Admin\AnswerController::class, ['as' => 'admin'])->except(['edit', 'update', 'index']);
        Route::resource('homework', Admin\HomeworkController::class, ['as' => 'admin'])->except(['update', 'edit']);
        Route::resource('admin', Admin\AdminController::class, ['as' => 'admin'])->except(['update', 'edit', 'show']);
        Route::resource('activity', Admin\ActivityController::class, ['as' => 'admin'])->except(['update', 'edit', 'show']);
        Route::resource('schedual', Admin\SchedualController::class, ['as' => 'admin'])->except(['update', 'edit', 'show']);
        Route::resource('rate', Admin\RateController::class, ['as' => 'admin'])->only(['index', 'destroy']);
    });

    Route::prefix('teacher/')->middleware('role:teacher')->group(function () {
        Route::get('/', Teacher\HomeController::class)->name('teacher.homepage');
        Route::get('home', Teacher\HomeController::class)->name('teacher.home');
        Route::get('dashboard', Teacher\HomeController::class)->name('teacher.dashboard');
        Route::get('student/{grade}/grade', [App\Http\Controllers\Teacher\StudentController::class, 'byGrade'])->name('teacher.grade.student');
        Route::get('answer/{homework}/homework', [App\Http\Controllers\Teacher\AnswerController::class, 'byHomework'])->name('teacher.homework.answer');
        Route::get('homework/{grade}/grade', [App\Http\Controllers\Teacher\HomeworkController::class, 'byGrade'])->name('teacher.grade.homework');
        Route::resource('student', Teacher\StudentController::class, ['as' => 'teacher']);
        Route::resource('answer', Teacher\AnswerController::class, ['as' => 'teacher'])->except(['edit', 'update', 'index']);
        Route::resource('homework', Teacher\HomeworkController::class, ['as' => 'teacher'])->except(['update', 'edit']);
        Route::resource('activity', Teacher\ActivityController::class, ['as' => 'teacher'])->except(['update', 'edit', 'show']);
        Route::resource('schedual', Teacher\SchedualController::class, ['as' => 'teacher'])->except(['update', 'edit', 'show']);
        Route::resource('rate', Teacher\RateController::class, ['as' => 'teacher'])->except(['update', 'edit']);
    });

    Route::prefix('student/')->middleware('role:student')->group(function () {
        Route::get('/', Student\HomeController::class)->name('student.homepage');
        Route::get('home', Student\HomeController::class)->name('student.home');
        Route::get('dashboard', Student\HomeController::class)->name('student.dashboard');
        Route::get('answer/{homework}/create', [App\Http\Controllers\Student\AnswerController::class, 'create'])->name('student.answer.create');
        Route::post('answer/{homework}/store', [App\Http\Controllers\Student\AnswerController::class, 'store'])->name('student.answer.store');
        Route::resource('homework', Student\HomeworkController::class, ['as' => 'student'])->except(['update', 'edit']);
        Route::resource('activity', Student\ActivityController::class, ['as' => 'student'])->except(['update', 'edit', 'show']);
        Route::resource('schedual', Student\SchedualController::class, ['as' => 'student'])->except(['update', 'edit', 'show']);
    });
});

Route::prefix('profile')->middleware('auth:web')->group(function () {
    Route::get('/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::prefix('users')->middleware('auth:web')->group(function () {
    Route::get('/list', [ProfileController::class, 'listUsers'])->name('users.list');
});
