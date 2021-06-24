<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/get_item','ItemController@get_item');
Route::get('/get_category','ItemController@get_category');
Route::get('/get_customer_name/{name}','ItemController@get_customer_name');
Route::post('/get_checkout/{dataCheckout}','ItemController@get_checkout');
Route::get('/get_order/{loginame}','ItemController@get_order');
Route::delete('/get_delete/{id}','ItemController@get_delete');