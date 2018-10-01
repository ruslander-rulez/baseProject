<?php

    Route::group(["as" => "web.", "namespace" => "Web"], function () {

        Route::get("/advice/{slug}", ["uses" => "AdviceController@bySlug", "as" => "advice.single"]);
        Route::get("/advices/", ["uses" => "AdviceController@list", "as" => "advice.list"]);

        Route::get("/", ["uses" => "PageController@index", "as" => "index"]);
        Route::get("/{page}", ["uses" => "PageController@page", "as" => "page"]);


    });