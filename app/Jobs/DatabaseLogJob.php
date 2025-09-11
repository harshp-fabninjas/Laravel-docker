<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DatabaseLogJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $message;

    /**
     * Create a new job instance.
     */
    public function __construct($message = 'Default job message')
    {
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            // Just test database connection and log
            DB::connection()->getPdo();

            Log::info('DatabaseLogJob executed successfully', [
                'message' => $this->message,
                'timestamp' => now()->toDateTimeString(),
                'database_connected' => true
            ]);

        } catch (\Exception $e) {
            Log::error('DatabaseLogJob failed', [
                'error' => $e->getMessage(),
                'message' => $this->message
            ]);
        }
    }
}
