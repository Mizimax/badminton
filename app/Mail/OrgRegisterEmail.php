<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrgRegisterEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $Firstname;
    public $Lastname;
    public $Link;

    public function __construct($firstname, $lastname, $link)
    {
        //
        $this->Firstname = $firstname;
        $this->Lastname = $lastname;
        $this->Link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'ยืนยันการสมัครเป็น Organizer';

        return $this->view('org/regis/email_format')
                    ->subject($subject)
                    ->with('Firstname', $this->Firstname)
                    ->with('Lastname', $this->Lastname)
                    ->with('Link', $this->Link);
    }
}
