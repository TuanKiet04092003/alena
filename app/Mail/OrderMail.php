<?php

namespace App\Mail;

use App\Models\orderdetails;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $order;
    public $orderdetail;
    public $new;
    public $productName;
    public $colors;
    public $sizes;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $order, $orderdetail, $new, $productName, $colors, $sizes)
    {
        $this->user=$user;
        $this->order=$order;
        $this->orderdetail=$orderdetail;
        $this->new=$new;
        $this->productName=$productName;
        $this->colors=$colors;
        $this->sizes=$sizes;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user=$this->user;
        $order=$this->order;
        $orderdetail=$this->orderdetail;
        $new=$this->new;
        $productName=$this->productName;
        $colors=$this->colors;
        $sizes=$this->sizes;
        return $this->view('mailorder', compact('user','order',
        'orderdetail','new','productName','colors','sizes' ));
    }
}
