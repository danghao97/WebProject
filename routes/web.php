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

Route::get('/json', 'AppController@JSon');

Route::get('signout', 'AppController@Signout');

Route::get('config', 'ConfigController@Config')->name('config');

Route::post('config', 'ConfigController@Save');

Route::get('signin', 'SigninController@Signin')->name('signin');

Route::post('signin', 'SigninController@DoSignin');

Route::get('signup', 'SigninController@Signup');

Route::post('signup', 'SigninController@DoSignup');

Route::get('forgot', 'SigninController@Forgot');

Route::post('forgot', 'SigninController@DoForgot');

// Bắt hết các route còn lại và chuyển hướng về trang chủ
Route::get('/{any}', function($any) {
    return redirect()->route('/');
});

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
