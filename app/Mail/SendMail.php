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
    
   public function request($request)
 {
    $request =[
        'subject'=>$request->subject,
        'content'=>$request->content,
        'email'=>$request->email,
       
        
    ];
 }  

    /**
     * Create a new message instance.
     */

     
    public function __construct($request)
    {
        $this->request =$request;
   
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
        return new Envelope(
          
            subject:  $this->request['subject'],
            from: new Address( $this->request['email'])

        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            with:[
                'content'=>$this->request['content'],
                
            ],
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
