<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Test4Command extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'test4';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test command 4 - runs every 1 minute';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        sleep(30);

        logger('Test4 command executed successfully - runs every 1 minute');

        return Command::SUCCESS;
    }
}
