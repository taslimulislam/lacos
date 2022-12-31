<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class PaymentInvoice extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailData)
    {
    $this->emailData = $emailData;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        // $emailfrom = env('MAIL_USERNAME');
        $data = $this->emailData;

        // return $this->from($emailfrom, 'Gambia college')
        //                 ->view('studentenquery::redirect-enquery-edit-mail',compact('data'));
        return $this->view('studentenquery::redirect-enquery-edit-mail',compact('data'));








    }
}
