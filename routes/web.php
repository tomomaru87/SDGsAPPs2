<?php

//TOPページ
Route::get('/','CompanyController@add');


//会社情報入力関係



//ログイン画面
// ユーザー
Route::namespace('User')->prefix('user')->name('user.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false,
        'edit' => true
    ]);

    // ログイン認証後
    Route::middleware('auth:user')->group(function () {

        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);
        //アイディアの編集ルート↓
        Route::post('edit', 'HomeController@edit');
        Route::post('comp','HomeController@update');
        Route::post('add','HomeController@add');
        Route::post('success','HomeController@success');
        Route::post('destroy','HomeController@destroy');
       
    });
});

// 管理者
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false,
        'edit' => true
    ]);

    // ログイン認証後
    Route::middleware('auth:admin')->group(function () {

        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);
        
    });

});
