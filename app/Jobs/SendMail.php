<?php

namespace App\Jobs;

use App\Mail\SendMail as MailSendMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendMail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public $email = 'eldorbeksuvonberdiev0169@mail.ru';
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new MailSendMail($this->data));
    }
}
