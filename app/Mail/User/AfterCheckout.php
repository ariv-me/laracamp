<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AfterCheckout extends Mailable
{
    use Queueable, SerializesModels;

    private $checkout;

    public function __construct($checkout)
    {
        $this->checkout = $checkout;
    }

    public function build()
    {

        return $this->subject("Register Camp : {{$this->checkout->Camp->title}}")->markdown('emails.checkout.afterCheckout',[
            'checkout' => $this->checkout
        ]);
    }
}
