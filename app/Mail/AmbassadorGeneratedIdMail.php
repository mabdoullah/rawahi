<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AmbassadorGeneratedIdMail extends Mailable
{
    use Queueable, SerializesModels;

    public $ambassador;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ambassador)
    {
        $this->ambassador = $ambassador;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('رقم السفير الخاص بك لمنصة رواهى')
                      ->from(env('MAIL_FROM'),'rawahi.com')
                      ->view('front.ambassadors.generated_id_mail')->with('ambassador',$this->ambassador);
    }
}
