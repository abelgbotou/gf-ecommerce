<?php


use Illuminate\Support\Facades\Route;

    Route::group(["prefix" =>'admin', 'middleware'  => 'is_admin'], function(){
        Route::get('/products/index', 'ProductController@index')->name('index');

        Route::get('/products/create','ProductController@create')->name('create');
  
        Route::post('/products/store','ProductController@store')->name('store');
  
        Route::get('/products/edit/{id}', 'ProductController@edit')->name('edit');
  
        Route::post('/product/update/{id}','ProductController@update')->name('update');
  
        Route::get('/product/delete/{product}','ProductController@delete')->name('delete');
    });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
