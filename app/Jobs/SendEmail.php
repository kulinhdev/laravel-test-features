<?php

namespace App\Jobs;

use App\Http\Controllers\QueueController;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $details;
    public function __construct($details)
    {
        $this->details = $details;
        writeLog("Job params: ", $this->details);
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $queueController = new QueueController();

        $queueController->sendMailProcess($this->details);
    }

    public function failed(Exception $exception)
    {
        writeLog("Job send mail failed :::  errorMessage: " . $exception->getMessage(), $this->details);
    }
}
