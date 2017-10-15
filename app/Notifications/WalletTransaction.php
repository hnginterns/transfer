<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;


class WalletTransaction extends Notification implements ShouldQueue
{
    use Queueable;
    protected $transaction;
    protected $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($transaction, $user)
    {
        $this->transaction = $transaction;
        $this->user = $user;
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
                    ->line('A total amount of '.$this->transaction->amount.' was transfered from 
                     '.$this->transaction->source->wallet_name.' wallet to '. $this->transaction->destination->wallet_name.' by
                      '. $this->user->username)
                      ->action('View Transaction', url("/wallet/".$this->transaction->source->id))
                    ->line('Thank you for using '.config('app.name'));
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
