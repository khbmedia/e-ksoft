<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/get_item/{tenancy}','ItemController@get_item');
Route::get('/get_category/{tenancy}','ItemController@get_category');
Route::get('/get_customer_name/{tenancy}/{name}','ItemController@get_customer_name');
Route::post('/get_checkout/{tenancy}','ItemController@get_checkout');
Route::get('/get_order/{tenancy}/{loginame}','ItemController@get_order');
Route::get('/get_edit_order/{tenancy}/{id}','ItemController@get_edit_order');
Route::delete('/get_delete/{tenancy}/{id}','ItemController@get_delete');