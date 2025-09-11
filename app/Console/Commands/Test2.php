<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Test2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        sleep(5);
        logger('2');
        // DatabaseLogJob::dispatch('everyTenSeconds - Scheduled job executed at ' . now());
    }
}
