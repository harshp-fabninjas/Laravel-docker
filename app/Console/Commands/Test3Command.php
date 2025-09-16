<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Test3Command extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test3';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test command 3 - runs every 30 seconds';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        sleep(20);

        logger('Test3 command executed successfully - runs every 30 seconds');

        return Command::SUCCESS;
    }
}
