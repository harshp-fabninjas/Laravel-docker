<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/demo', function () {
    return view('demo');
});

Route::get('/test-job', function () {
    \App\Jobs\DatabaseLogJob::dispatch('Test job executed from web route at ' . now());
    return 'Job dispatched! Check the database and logs.';
});
