<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class OrderMailClient extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->data['url'] = URL::signedRoute('invoice.print', ['id' => $data['id']]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        {
            return $this->markdown('mails.orderMailClientView')
                ->subject($this->data['subject']);
        }
    }
}
