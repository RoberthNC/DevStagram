<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostCotroller;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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
    return view('principal');
});

Route::get("/register", [RegisterController::class, 'index'])->name("register");
Route::post("/register", [RegisterController::class, 'store']);

Route::get("/login",[LoginController::class, 'index'])->name("login");
Route::post("/login",[LoginController::class, 'store']);
Route::post("/logout",[LogoutController::class, 'store'])->name("logout");

Route::get("/{user:username}",[PostCotroller::class, 'index'])->name("posts.index");
Route::get("/posts/create",[PostCotroller::class, 'create'])->name("posts.create");
Route::post("/posts",[PostCotroller::class,'store'])->name("posts.store");
Route::get("/{user:username}/posts/{post}",[PostCotroller::class,'show'])->name("posts.show");
Route::delete("/posts/{post}",[PostCotroller::class,'destroy'])->name("posts.destroy");

Route::post("/{user:username}/posts/{post}",[ComentarioController::class,'store'])->name("comentarios.store");

Route::post("/imagenes",[ImagenController::class, "store"])->name("imagenes.store");

Route::post("/posts/{post}/like",[LikeController::class,'store'])->name("posts.likes.store");
Route::delete("/posts/{post}/like",[LikeController::class,'destroy'])->name("posts.likes.destroy");