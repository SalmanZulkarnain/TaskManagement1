<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['role:user']], function(){
    Route::controller(TaskController::class)->group(function () {
        // INDEX TASK
        Route::get('/index', 'index')->name('task.index');
    
        // CREATE
        Route::post('/create', 'store')->name('task.store');
        Route::get('/create', 'create')->name('task.create');
    
        // READ
        Route::get('/show/{id}', 'show')->name('task.show');
    
        // UPDATE
        Route::get('/update/{id}', 'edit')->name('task.edit');
        Route::put('/update/{id}', 'update')->name('task.update');
    
        // DELETE
        Route::delete('/index/{id}', 'destroy')->name('task.destroy');

        Route::post('/completed/{id}', 'completed')->name('task.completed');
    });
});


Route::group(['middleware' => ['role:user']], function(){
    Route::controller(CategoryController::class)->group(function () {
        // INDEX CATEGORY
        Route::get('/category/index', 'index')->name('category.index');
    
        // CREATE
        Route::post('/category/create', 'store')->name('category.store');
        Route::get('/category/create', 'create')->name('category.create');
    
        // READ
        Route::get('/category/show/{id}', 'show')->name('category.show');
    
        // UPDATE
        Route::get('/category/update/{id}', 'edit')->name('category.edit');
        Route::put('/category/update/{id}', 'update')->name('category.update');
    
        // DELETE
        Route::delete('/category/index/{id}', 'destroy')->name('category.destroy');
    });
});

Route::get('/pusher', function () {
    return view('notifications.pusher');
});

Route::get('/user/notification', [NotificationController::class, 'showNotification']);

Route::post('/user/notificationsave', [NotificationController::class,'save'])->name('notification.save');