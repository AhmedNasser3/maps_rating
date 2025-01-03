<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendReport extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->data['email'])
                    ->to(config('mail.to.address'), config('mail.to.name'))
                    ->subject('إبلاغ عن موقع مكرر')
                    ->markdown('emails.temolate')  // تأكد من أن الميزة `emails.temolate` موجودة
                    ->with('data', $this->data);
    }
}