<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DatHangThanhCongMail extends Mailable
{
    use Queueable, SerializesModels;

    public $cart;

    public function __construct($cart)
    {
        $this->cart = $cart;
    }

    public function build()
    {
        return $this->subject('Đặt hàng thành công')
                    ->view('emails.dat_hang_thanh_cong');
    }
}