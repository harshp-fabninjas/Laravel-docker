<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Test5Command extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test5';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test command 5 - runs every hour';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        sleep(35);

        logger('Test5 command executed successfully - runs every hour');

        return Command::SUCCESS;
    }
}
