<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class QueueController extends Controller
{
    protected $queueName = 'test-queue';

    public function testQueue()
    {
        $details = [
            'from' => 'sender@example.com',
            'from_name' => 'Sender Name',
            'to' => 'receiver@example.com',
            'subject' => 'Testing the Queue',
            'message' => 'Message send from to you.'
        ];

        SendEmail::dispatch($details)->onQueue($this->queueName);
        return response()->json(['message' => "The email has been sent to the queue!"]);
    }

    public function sendMailProcess(array $details)
    {
        // $email = new Mailable();
        // $email->from($details['from'], $details['from_name']);
        // $email->to($details['to']);
        // $email->subject($details['subject']);
        // Mail::send($details['view'], $details['data'], function ($message) use ($email) {
        //     $message->from($email->from[0], $email->from[1])
        //         ->to($email->to[0])
        //         ->subject($email->subject);
        // });

        writeLog("Job send mail success to: " . $details['to']);
    }
}
