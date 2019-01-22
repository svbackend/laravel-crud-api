<?php

Route::get('/items', 'ItemController@index');
Route::get('/items/{item}', 'ItemController@show');
Route::post('/items', 'ItemController@store');
Route::put('/items/{item}', 'ItemController@update');
Route::delete('/items/{item}', 'ItemController@delete');