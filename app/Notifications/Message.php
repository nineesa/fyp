<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Message extends Notification
{
    use Queueable;
    protected $namapeserta;
    protected $program;
    protected $tarikh_mula;
    protected $tarikh_akhir;
    protected $masa_mula;
    protected $masa_akhir;
    protected $lokasi;
    protected $timestamp;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($namapeserta, $program, $tarikh_mula, $tarikh_akhir, $masa_mula, $masa_akhir, $lokasi)
    {
      $this->namapeserta= $namapeserta;
      $this->program= $program;
      $this->tarikh_mula=$tarikh_mula;
      $this->tarikh_akhir=$tarikh_akhir;
      $this->masa_mula=$masa_mula;
      $this->masa_akhir=$masa_akhir;
      $this->lokasi=$lokasi;
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
            ->greeting("Hai {$this->namapeserta} ,")
            ->line("Sukacitanya dimaklumkan bahawa anda telah mendaftar bagi program {$this->program} yang akan diadakan seperti ketetapan dibawah :")
            ->line("Tarikh: {$this->tarikh_mula} - {$this->tarikh_akhir}")
            ->line("Masa: {$this->masa_mula} - {$this->masa_akhir}")
            ->line("Lokasi: {$this->lokasi} ")
            ->line("Sila sahkan kehadiran anda sebelum menghadiri program melalui Portal e-Latihan !")
            ->line("Terima kasih");
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
