<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class QueueController extends Controller
{
    protected $queueName = 'test-queue';

    public function testQueue()
    {
        $details = [
            'from_name' => 'KuLinh Dev',
            'to' => 'linhpn3@smartosc.com',
            'to_name' => 'Pham Ngoc Linh',
            'subject' => 'Testing send Mail and Queue',
            'message' => 'Have a nice day ...!'
        ];

        SendEmail::dispatch($details)->onQueue($this->queueName);
        return response()->json(['message' => "The email has been sent to the queue!"]);
    }

    public function sendMailProcess(array $details)
    {
        Mail::to($details['to'])->send(new SendMail($details));

        writeLog("Job send mail success to: " . $details['to']);
    }
}
