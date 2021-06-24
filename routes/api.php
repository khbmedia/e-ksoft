<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/get_item','ItemController@get_item');
Route::get('/get_category','ItemController@get_category');
Route::get('/get_customer_name/{name}','ItemController@get_customer_name');