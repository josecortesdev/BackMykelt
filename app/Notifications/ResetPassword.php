<?php

namespace App\Notifications;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;



class ResetPassword extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
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
        ->greeting('Hola!')
        ->subject('Solicitud de restablecimiento de contraseña')
        ->greeting('¿Restablecer tu contraseña?')
        ->line('Si solicitaste un restablecimiento de contraseña pulsa el siguiente botón para completar el proceso. Si no solicitaste esto, puedes ignorar este correo electrónico.')
        ->action('Restablecer contraseña', url('https://mykelt.com/formulario-restablecer?token='.$this->token))
        // ->line('Gracias por usar la aplicación!')
        ->salutation('Un saludo.');


   
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
