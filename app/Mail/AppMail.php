<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AppMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data1;
    public $data2;

    public function __construct($data1, $data2)
    {
        $this->$data1 = $data1;
        $this->$data2 = $data2;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('pengirim@malasngoding.com')
                   ->view('master_data/email_template')
                   ->with(
                    [
                        'nama' => $this->data1,
                        'pesan' => $this->data2,
                    ]);
    }
}
