<?php

namespace App\Console\Commands;

use App\Jobs\DatabaseLogJob;
use Illuminate\Console\Command;

class Test1 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test1';

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
        logger('1');
    }
}
