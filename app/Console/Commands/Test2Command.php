<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Test2Command extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test2';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test command 2 - runs every 10 seconds';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        sleep(15);

        logger('Test2 command executed successfully - runs every 10 seconds');

        return Command::SUCCESS;
    }
}
