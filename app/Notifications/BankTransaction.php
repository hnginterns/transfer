<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class BankTransaction extends Notification implements ShouldQueue
{
    use Queueable;
    protected $transaction;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->success()
                    ->subject('Bank Transaction Details')
                    ->line('Your transfer to '.$this->transaction->beneficiary->name.'
                            with account number '.$this->transaction->beneficiary->account_number.' was successful')
                    ->line('Amount &#8358; '.$this->transaction->amount)
                    ->line('Visit the link below to view the transaction on your dashboard')
                    ->action('View Transaction', url("/wallet/".$this->transaction->wallet_id))
                    ->line('Thank you for using transfer transfer rules!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
