<?php

use App\Image;

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

Route::get('/', function () {
    // $images = Image::all();
    $images = Image::paginate(10);

    abort_if($images->isEmpty(), 204);

    return view('welcome', [
        'images' => $images,
    ]);
});

Route::get('/page/2', function () {
    return view('welcome2');
});
Route::get('/page/3', function () {
    return view('welcome3');
});

Route::get('/horizontal', function () {
    // $images = Image::all();
    $images = Image::paginate(10);

    abort_if($images->isEmpty(), 204);

    return view('horizontal', [
        'images' => $images,
    ]);
});
