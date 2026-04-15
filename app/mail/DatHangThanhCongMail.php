<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DatHangThanhCongMail extends Mailable
{
    use Queueable, SerializesModels;

    public $cart;
    public $tongTien;

    public function __construct($cart, $tongTien)
    {
        $this->cart = $cart;
        $this->tongTien = $tongTien;
    }

    public function build()
    {
        return $this->subject('Đặt hàng thành công')
                    ->view('emails.dat_hang_thanh_cong');
    }
}