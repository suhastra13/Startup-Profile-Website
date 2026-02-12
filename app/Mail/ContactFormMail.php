<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data; // Variabel untuk menampung data pesan

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('Pesan Baru dari Website WokilTech')
            ->replyTo($this->data['email']) // Agar admin bisa langsung reply ke pengirim
            ->view('emails.contact'); // Kita akan buat view ini di langkah 4
    }
}
