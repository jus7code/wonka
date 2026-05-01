<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Auth');
});

Route::get('/humanresources', function () {
    return view('HumanR');
});

Route::get('/dashboard', function () {
    return view('Dashboard');
});


Route::get('/Accounting', function () {
    return view('Accounting');
});

Route::get('/inventory', function () {
    return view('Inventory');
});

Route::get('/OrderChocolate', function () {
    return view('OrderChocolate');
});

Route::get('/Clients', function () {
    return view('Clients');
});


Route::get('/batchregister', function () {
    return view('BatchRegister');
});

