<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HelloMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @param array $data
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message for confirming a reservation.
     *
     * @return $this
     */
    public function confirmReservation()
    {
        return $this->subject('Confirmation de réservation')
            ->view('text');
    }

    /**
     * Build the message for accepting a reservation.
     *
     * @return $this
     */
    public function acceptReservation()
    {
        return $this->subject('Reservation Accepted')
            ->view('text');
    }

    /**
     * Build the message for refusing a reservation.
     *
     * @return $this
     */
    public function refuseReservation()
    {
        return $this->subject('Reservation Refused')
            ->view('text');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $emailType = $this->data['emailType'];

        // Send different emails based on the email type
        switch ($emailType) {
            case 'confirm':
                return $this->confirmReservation();
            case 'accept':
                return $this->acceptReservation();
            case 'refus':
                return $this->refuseReservation();
            default:
                // Default to confirm reservation
                return $this->confirmReservation();
        }
    }
}
