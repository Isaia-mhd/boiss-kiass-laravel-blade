<?php

namespace App\Listeners;

use App\Events\PaymentCompleted;
use App\Mail\MailSendReceipt;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class sendReceipt
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PaymentCompleted $event)
    {
        $paymentDetails = $event->paymentDetails;

        Mail::to($paymentDetails["user"]["email"])->send(new MailSendReceipt($paymentDetails));
    }
}
