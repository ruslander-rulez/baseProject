<?php

Route::group(['middleware' => 'not.auth.admin'], function () {
    Route::redirect('/root', '/root/login', 301);
    Route::get('root/login', ['as' => 'dashboard.login.show', 'uses' => 'Auth\AuthorizationController@loginPage']);
    Route::post('root/login', ['as' => 'dashboard.login', 'uses' => 'Auth\AuthorizationController@login']);
    /*
        Route::group(['prefix' => 'admin/password'], function () {
            Route::get('recover', [
                'as' => 'admin.password.recover.show', 'uses' => 'Auth\ForgotPasswordController@recoverPasswordPage'
            ]);
            Route::post('send/reset/link', [
                'as' => 'admin.password.recover.send', 'uses' => 'Auth\ForgotPasswordController@sendResetLink'
            ]);
            Route::get('set/new/{code}', [
                'as' => 'admin.password.set.new', 'uses' => 'Auth\ForgotPasswordController@newPasswordPage'
            ]);
            Route::put('update/to/new', [
                'as' => 'admin.password.update.to.new', 'uses' => 'Auth\ForgotPasswordController@setNewPassword'
            ]);
        });*/
});

Route::group(['middleware' => 'auth.as.admin', "prefix" => "/root", "as" => "root."], function () {
    Route::post("/logout", ["as" => "logout", "uses" => "Auth\AuthorizationController@logout"]);
    Route::get("/", ["uses" => "RootController@index", "as" => "index"]);


});