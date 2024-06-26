<?php

// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;   //追記
use App\Http\Controllers\UsersController;   //追記
use App\Http\Controllers\SalesprojectsController;   //追記
use App\Http\Controllers\CustomersController;   //追記


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
    return view('top');
    
});

Route::get('/dashboard',[TasksController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('tasks', TasksController::class, ['only' =>['show','store', 'destroy']]);   //TasksControllerに権限者ユーザーの詳細（タスクと案件一覧を作成）
    Route::resource('users', UsersController::class, ['only' => ['index', 'show']]);
    Route::resource('salesprojects', SalesprojectsController::class);
    Route::resource('customers', CustomersController::class, ['only' =>['index', 'show', 'edit', 'update', 'destroy']]);
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
