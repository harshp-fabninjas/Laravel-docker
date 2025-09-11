<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Jobs\DatabaseLogJob;

// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote');

// // Schedule the database job to run every minute
// Schedule::call(function () {
//     DatabaseLogJob::dispatch('everyTenSeconds - Scheduled job executed at ' . now());
// })->everyTenSeconds();

// Schedule::call(function () {
//     DatabaseLogJob::dispatch('everyFifteenSeconds - Scheduled job executed at ' . now());
// })->everyFifteenSeconds();

// Schedule::call(function () {
//     DatabaseLogJob::dispatch('everyMinute - Scheduled job executed at ' . now());
// })->everyMinute();
// ->runInBackground()->withoutOverlapping();
// Schedule::command('app:test1')->everyTenSeconds()->runInBackground();
Schedule::command('app:test2')->everyTenSeconds()->onOneServer()->withoutOverlapping()->runInBackground();
Schedule::command('app:test3')->everyMinute()->onOneServer()->withoutOverlapping()->runInBackground();