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



//TOPページ
Route::get('/','CompanyController@add');


//会社情報入力関係

Route::get('input','CompanyController@index');

//送信完了後
Route::get('thnks','CompanyController@thnks');
Route::post('thnks','CompanyController@post');

//会社のアイディア管理者画面
// Route::post('admin/home','IdeaController@add');

//会社はここまで・・・・・・・・・・・・・・・・・・・・・・・・・・・



//アイディア入力関係のルート
//入力画面
Route::get('idea/input','ideacontroller@index');


//thnks画面のルート
Route::post('idea/thnks','Ideacontroller@post');
Route::get('idea/thnks','IdeaController@thnks');


//ログイン画面
// ユーザー
Route::namespace('User')->prefix('user')->name('user.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    // ログイン認証後
    Route::middleware('auth:user')->group(function () {

        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);

    });
});

// 管理者
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    // ログイン認証後
    Route::middleware('auth:admin')->group(function () {

        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);

    });

});
