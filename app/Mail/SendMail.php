<?php

namespace App\Mail;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    public array $data;
    
 
  

    /**
     * Create a new message instance.
     */

     
    public function __construct(array $content)
    {
        $this->data = $content;
    }
   
    

    /**
     * Build the message.
     *
     * @return $this
     */
  

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        // return new Envelope(
          
        //     subject:  $this->request['subject'],
        //     from: new Address( $this->request['email'])

        // );
        return new Envelope(
            from: new Address($this->data['email']),
            subject: $this->data['subject'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // return new Content(
        //     with:[
        //         'content'=>$this->request['content'],
                
        //     ],
        // );
        
        return new Content(
            markdown: 'emails.sendmail',
            with:[
                'content'=>$this->data['content']
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
