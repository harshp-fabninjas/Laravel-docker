<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote');

// Schedule the test commands
Schedule::command('test1')->everyTenSeconds()->onOneServer()->withoutOverlapping()->runInBackground();
Schedule::command('test2')->everyTenSeconds()->onOneServer()->withoutOverlapping()->runInBackground();
Schedule::command('test3')->everyThirtySeconds()->onOneServer()->withoutOverlapping()->runInBackground();
Schedule::command('test4')->everyMinute()->onOneServer()->withoutOverlapping()->runInBackground();
Schedule::command('test5')->hourly()->onOneServer()->withoutOverlapping()->runInBackground();