<?php

use App\Http\Controllers\PostController;
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
    return to_route('posts.create');
});

Route::resource('posts', PostController::class)->only(['index', 'create', 'store']);
Route::post('posts/tmp-upload', [PostController::class, 'uploadTemp'])->name('tmp.store');
Route::delete('posts/tmp-delete', [PostController::class, 'deleteTemp'])->name('tmp.delete');
