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

    Route::group(["prefix" => "/advice"], function () {
        Route::get("/", ["uses" => "AdviceController@index", "as" => "advice.index"]);

        Route::get("/list", ["uses" => "AdviceController@list", "as" => "advice.list"]);
        Route::put("/", ["uses" => "AdviceController@save", "as" => "advice.save"]);
        Route::post("/", ["uses" => "AdviceController@create", "as" => "advice.create"]);
        Route::delete("/", ["uses" => "AdviceController@delete", "as" => "advice.delete"]);
    });

    Route::group(["prefix" => "/category"], function () {
        Route::get("/", ["uses" => "CategoryController@index", "as" => "category.index"]);

        Route::get("/list", ["uses" => "CategoryController@list", "as" => "category.list"]);
        Route::put("/", ["uses" => "CategoryController@save", "as" => "category.save"]);
        Route::post("/", ["uses" => "CategoryController@create", "as" => "category.create"]);
        Route::delete("/", ["uses" => "CategoryController@delete", "as" => "category.delete"]);
    });

    Route::group(["prefix" => "/product"], function () {
        Route::get("/", ["uses" => "ProductController@index", "as" => "product.index"]);

        Route::get("/list", ["uses" => "ProductController@list", "as" => "product.list"]);
        Route::put("/", ["uses" => "ProductController@save", "as" => "product.save"]);
        Route::post("/", ["uses" => "ProductController@create", "as" => "product.create"]);
        Route::delete("/", ["uses" => "ProductController@delete", "as" => "product.delete"]);
    });

    Route::group(["prefix" => "/attachment"], function () {
        Route::get("/", ["uses" => "AdviceController@index", "as" => "advice.index"]);

//        Route::get("/list", ["uses" => "AdviceController@list", "as" => "advice.list"]);
//        Route::put("/", ["uses" => "AdviceController@save", "as" => "advice.save"]);
        Route::post("/", ["uses" => "AttachmentController@create", "as" => "attachment.create"]);
//        Route::delete("/", ["uses" => "AdviceController@delete", "as" => "advice.delete"]);
    });

});