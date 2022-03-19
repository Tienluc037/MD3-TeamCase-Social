<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function () {
    return view('backend.auth.login');
});
Route::middleware('checkLogin')->group(function () {
    Route::prefix('posts')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('posts.index');
        Route::get('/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/create', [PostController::class, 'store'])->name('posts.store');
        Route::get('/delete/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
        Route::post('/update/{id}', [PostController::class, 'update'])->name('posts.update');


        Route::prefix('comments')->group(function () {
            Route::get('/', [CommentController::class, 'index'])->name('comments.index');
            Route::post('/store/{id}', [CommentController::class, 'store'])->name('comments.store');
            Route::get('/delete/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
        });


    });
});


Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('detail/{id}', [UserController::class, 'show'])->name('users.show');
});


Route::get('/login', [AuthController::class, 'showFormLogin'])->name('showFormLogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('checkRegister')->group(function () {
    Route::get('/register', [AuthController::class, 'showFormRegister'])->name('showFormRegister');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::get('add-friend/{id}', function ($id) {
    $from = Auth::user()->id;
    $to = $id;
    DB::table('relations')->insert(['from' => $from, 'to' => $to, 'status_id' => 1]);
    return redirect()->route('users.show',$id);
})->name('addFriend');
Route::get('cancel-request/{id}', function ($id) {
    $from = Auth::user()->id;
    $to = $id;
    DB::table('relations')->where(['from' => $from, 'to' => $to, 'status_id' => 1])->delete();
    return redirect()->route('users.show',$id);
})->name('cancel.request');
