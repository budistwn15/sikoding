<?php

namespace App\Mail;

use App\Models\Certificate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SikodingEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $code_certificate;
    public function __construct($code_certificate)
    {
        $this->code_certificate = $code_certificate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('budi.setiawan112001@gmail.com', 'SiKoding')->subject('Certificate')->view('mail.certificate');
    }
}
