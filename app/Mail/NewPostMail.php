<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPostMail extends Mailable
{
    use Queueable, SerializesModels;

public $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($_post)
    {
        $this->post = $_post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.new-post', [
            "post" => $this->post,
            "user" => $this->post->user,
        ])
            ->subject("Conferma creazione nuovo post: " . $this->post->title);
    }
}
