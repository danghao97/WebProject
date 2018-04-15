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

Route::get('/', 'AppController@Home')->name('/');

Route::get('/home', 'AppController@Home');

Route::get('gmail', function () {
    // $data để truyền dữ liệu cho template
    $data = array(
        'name'      => 'Tên của bạn',
        'email'     => 'Email của bạn',
        'content'   => 'Nội dung email',
    );
    Mail::send('Mail.MailTemplate', $data, function ($message) {
        $message->from('admin@webproject.com', 'Administrator');
        $message->to('danghaopro97@gmail.com', 'Người nhận')->subject('Chủ đề');
    });
    return '';
});

Route::get('login', 'LoginController@Login')->name('login');

Route::post('login', 'LoginController@DoLogin');

Route::get('config', 'ConfigController@Config')->name('config');

Route::post('config', 'ConfigController@Save');

Route::get('logout', 'AppController@Logout');
