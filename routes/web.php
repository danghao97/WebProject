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

Route::get('/', 'AppController@Index')->name('/');

Route::get('Signout', 'AppController@Signout');

Route::get('Chart', 'AppController@Chart')->name('Chart');

Route::get('Start', 'AppController@Start');

Route::post('Answer', 'AnswerController@Answer');

Route::get('Message', 'AppController@Message');

Route::get('Message/{userid}', 'AppController@Message')->name('Message');

Route::post('SendMessage/{userid}', 'AppController@SendMessage');

Route::get('AddFriend/{userid}', 'AppController@AddFriend');

Route::get('About', 'AppController@About');

Route::prefix('Admin')->group(function () {
    Route::get('/', 'AppController@Admin')->name('Admin');
});

Route::get('Admin2', 'AppController@Admin2');

Route::get('Config', 'ConfigController@Config')->name('Config');

Route::post('Config', 'ConfigController@Save');

Route::get('Signin', 'SigninController@Signin')->name('Signin');

Route::post('Signin', 'SigninController@DoSignin');

Route::get('Signup', 'SigninController@Signup');

Route::post('Signup', 'SigninController@DoSignup');

Route::get('Forgot', 'SigninController@Forgot');

Route::post('Forgot', 'SigninController@DoForgot');

// Bắt hết các route còn lại và chuyển hướng về trang chủ
Route::get('/{any}', function ($any) {
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
