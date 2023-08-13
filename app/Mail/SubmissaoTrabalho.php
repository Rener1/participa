<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubmissaoTrabalho extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $subject, $trabalho)
    {
        $this->user = $user;
        $this->subject = $subject;
        $this->trabalho = $trabalho;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject($this->subject)
            ->markdown('emails.submissaoTrabalho')->with([
                        'user' => $this->user,
                        'trabalho' => $this->trabalho,
                    ]);
    }
}
