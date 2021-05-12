<?php

use App\Http\Controllers\Instructor\CourseController;
use App\Http\Livewire\Instructor\CourseCurriculum;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Instructor Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('', 'instructor/courses');
Route::resource('courses', CourseController::class)->names('courses');
Route::get('courses/{course}/curriculum', CourseCurriculum::class)->name('courses.curriculum');