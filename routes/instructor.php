<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\InstructorCourses;

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
Route::get('courses', InstructorCourses::class)->middleware('can:Leer cursos')->name('courses.index');