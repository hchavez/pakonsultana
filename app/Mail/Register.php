<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendInvitesMail extends Mailable
{

    use Queueable, SerializesModels;
    /**
     * @var User
     */
    public $subject;

    /**
     * Create a new message instance.
     *
     * @param User $user
     */
    public function __construct($subject='eBiyaheAffiliate SignUp')
    {
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this    
     */
    public function build()
    {
  
        return $this->subject($this->subject)->view('emails.user_sign_up');
        
        

    }
}
