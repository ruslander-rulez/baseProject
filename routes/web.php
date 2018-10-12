<?php

    Route::group(["as" => "web.", "namespace" => "Web"], function () {

        Route::get("/advice/{slug}", ["uses" => "AdviceController@bySlug", "as" => "advice.single"]);
        Route::get("/advices/", ["uses" => "AdviceController@list", "as" => "advice.list"]);

        Route::get("/category/{slug}", ["uses" => "CategoryController@bySlug", "as" => "category.single"]);
        Route::get("/product/{slug}", ["uses" => "ProductController@bySlug", "as" => "product.single"]);

        Route::get("/", ["uses" => "PageController@index", "as" => "index"]);
        Route::get("/{page}", ["uses" => "PageController@page", "as" => "page"]);


    });