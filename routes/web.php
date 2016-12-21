<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('Backend\Users.login2');
});

// Fontend Login and Dashboard
Route::group(['middleware'=>['web']],function(){
    Route::get('login',[
        'uses' => 'Fontend\UserController@Login',
        'as' => 'user.login.get',
    ]);


    Route::get('dashboard',[
        'uses' => 'Fontend\UserController@Dashboard',
        'as' => 'user.dashboard',
    ]);

    Route::get('confirm_mail/verify/{token}',[
        'uses' => 'UserController@Confirm_Email',
        'as' => 'confirm.email',
    ]);


});
// Backend Login and Register
Route::group(['middleware'=>['web']],function(){
    Route::post('login',[
        'uses' => 'Backend\UserController@Login_Post',
        'as' => 'user.login.post',
    ]);
    Route::post('register',[
        'uses' => 'Backend\UserController@Register',
        'as' => 'user.register',
    ]);
});




Route::get('demo',function(){
      return App\User::find('1');
});
