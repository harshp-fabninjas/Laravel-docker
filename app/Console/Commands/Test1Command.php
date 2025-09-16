<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Test1Command extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test1';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test command 1 - runs every 10 seconds';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        sleep(15);

        logger('Test1 command executed successfully - runs every 10 seconds');

        return Command::SUCCESS;
    }
}
