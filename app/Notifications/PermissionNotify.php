<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PermissionNotify extends Notification implements ShouldQueue
{
    use Queueable;

    protected $restriction;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($restriction)
    {
        $this->restriction = $restriction;
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
                    ->subject('Permission to Wallet')
                    ->line('You have been given permission to access '.$this->restriction->wallet->wallet_name)
                    ->line('You have the following access:')                   
                    ->line('1. ' .$this->restriction->can_fund_wallet = 'fund wallet')
                    ->line('2. '.$this->restriction->can_transfer_from_wallet = 'transfer from wallet')
                    ->line('3. '.$this->restriction->can_add_beneficiary = 'can add beneficiary')
                    ->line($this->restriction->can_transfer_to_wallets ? '4. can transfer to wallets with ids: '.$this->restriction->can_transfer_to_wallets : "")
                    ->line('Minimum amount for transfer: '.$this->restriction->min_amount)
                    ->line('Maximum amount for transfer: '.$this->restriction->max_amount)     
                
                    ->action('View Permission', url("/wallet/".$this->restriction->wallet_id))
                    ->line('Thank you for using our application!');
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
