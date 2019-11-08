<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CardAlreadyExistMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
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
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return (new MailMessage)
            ->subject('Card Exist')
            ->line('user tried to add card' . $this->number . ' which is already used by' . $this->userId);
    }
}
