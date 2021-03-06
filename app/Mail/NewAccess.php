<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewAccess extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.events.new-access')
            ->with('name', $this->user->name)
            ->with('datehour', now()->setTimezone('America/Sao_Paulo')->format('d/m/Y H:i:s'))
            ->attach(base_path() . '/resources/assets/files/PDF/teste.pdf');
    }
}
