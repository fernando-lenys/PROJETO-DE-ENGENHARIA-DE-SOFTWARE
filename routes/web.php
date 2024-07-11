<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
 

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


// returns the home page with all tasks
Route::get('/', TaskController::class .'@index')->name('tasks.index');
// returns the form for adding a task
Route::get('/tasks/create', TaskController::class . '@create')->name('tasks.create');
// adds a post to the database
Route::post('/tasks', TaskController::class .'@store')->name('tasks.store');
// returns a page that shows a task
Route::get('/tasks/{post}', TaskController::class .'@show')->name('tasks.show');
// returns the form for editing a task
Route::get('/tasks/{post}/edit', TaskController::class .'@edit')->name('tasks.edit');
// updates a task
Route::put('/tasks/{post}', TaskController::class .'@update')->name('tasks.update');
// deletes a task
Route::delete('/tasks/{post}', TaskController::class .'@destroy')->name('tasks.destroy');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    Route::get('/dashboard',  TaskController::class .'@index')->name('dashboard');
});

