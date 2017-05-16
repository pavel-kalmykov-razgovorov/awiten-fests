<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;


class ConfirmacionAsistenciaEvento extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($content)
    {
        //joseph-capriati_awakenings_true
        $this->actionUrlok = $content['urlok'];
        $this->actionUrlnoOk = $content['urlnoOk'];
        $this->actionUrlShow = $content['urlShow'];
        $this->nameArtist = $content['nameArtist'];
        $this->fecha = $content['fecha'];
        $this->nameFestival = $content['nameFestival'];
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
                    ->line('El artistas ' . $this->nameArtist . ' tiene una cita el ' . $this->fecha . ' en el festival ' . $this->nameFestival . ' ¡Confirma su asistencia!')
                    ->action('Confirmar', $this->actionUrlok)
                    ->line($this->actionUrlnoOk)
                    ->line($this->actionUrlShow);
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
