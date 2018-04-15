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
Route::domain('localhost')->group(function () {
    Route::get('/', function () {
        return view('Pages.Home');
    });

    Route::get('phpinfo', function () {
        phpinfo();
    });

    Route::get('templatemail', function() {
        return view('Mail.MailTemplate');
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
});

Route::domain('{account}.localhost')->group(function () {
    Route::get('/', function ($account) {
        echo "Home gage subdomain";
    });
});
