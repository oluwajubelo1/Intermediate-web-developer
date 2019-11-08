<?php

namespace App\Jobs;

use App\Mail\CardAlreadyExistMail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendMailToAdmin implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $userId, $number;
    public function __construct($userId, $number)
    {
        $this->userId = $userId;
        $this->number = $number;
    }

    /**
     * Execute the job.
     *
     * @return void
     */

    public function handle()
    {
        $email = $this->email;
        Mail::to($email)->send(new CardAlreadyExistMail($this->number, $this->userId));
        // Mail::to($email)->send(new PasswordResetMail($token));
    }
}
