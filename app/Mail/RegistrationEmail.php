<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegistrationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(private $validatedData)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Registration Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // dd($this->validatedData['message']);
        return new Content(
            view: 'emails.contact',
            with: [
                'nama_lengkap' => $this->validatedData['nama_lengkap'],
                'jenis_kelamin' => $this->validatedData['jenis_kelamin'],
                'tempat_lahir' => $this->validatedData['tempat_lahir'],
                'tanggal_lahir' => $this->validatedData['tanggal_lahir'],
                'alamat_lengkap' => $this->validatedData['alamat_lengkap'],
                'email' => $this->validatedData['email'],
                'phone' => $this->validatedData['phone'],
                'program_category' => $this->validatedData['program_category'],
                'nama_program' => $this->validatedData['nama_program'],
                'text_message' => $this->validatedData['message'],
                'registration_date' => $this->validatedData['registration_date'],
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
