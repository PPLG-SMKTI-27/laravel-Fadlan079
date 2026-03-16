<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public array $data,
        public string $designTheme = 'diary'
    ) {}

    public function build(): static
    {
        $view = match($this->designTheme) {
            'system' => 'emails.system',
            'clean'  => 'emails.clean',
            default => 'emails.diary',
        };

        return $this
            ->replyTo($this->data['email'])
            ->subject('[Portfolio Request] ' . $this->data['subject'])
            ->view($view);
    }
}
