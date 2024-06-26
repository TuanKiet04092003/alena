<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VoucherMail extends Mailable
{
    use Queueable, SerializesModels;
    public $code_voucher;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code_voucher)
    {
        $this->code_voucher=$code_voucher;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $code_voucher=$this->code_voucher;
        return $this->view('mailvoucher', compact('code_voucher'));
    }
}
