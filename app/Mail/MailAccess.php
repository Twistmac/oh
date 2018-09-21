<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailAccess extends Mailable
{
    use Queueable, SerializesModels;
    public $login;
    public $mdp;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($login , $password)    
    {
        $this->login = $login;
        $this->mdp = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('twistmac@outlook.fr')
                    ->subject('Accès application OHOME')
                    ->view('mail.mail-access')
                    ->with([
                        'login' => $this->login,
                        'mdp' => $this->mdp,
                    ]);
    }
}
