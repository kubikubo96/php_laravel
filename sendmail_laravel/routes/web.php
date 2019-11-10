<?php

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
    return view('welcome');
});


Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Đời không như là mơ',
        'body' => 'send mail laravel 6.x'
    ];
   
    \Mail::to('tien.nguyentat.1@gmail.com')->send(new \App\Mail\MyTestMail($details));
   
    dd("Email is Sent.");
});