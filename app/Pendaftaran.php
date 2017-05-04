<?php

namespace App;
//use App\Traits\Enums;
use App\User;
use Illuminate\Database\Eloquent\Model;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class Pendaftaran extends Model
{

  /**
     * [$table description]
     * @var string
     */
    protected $table = 'pendaftarans';
    /**
     * [$fillable description]
     * @var [type]
     */

  protected $fillable = ['penganjur', 'program', 'penerangan_program', 'tarikh_mula', 'tarikh_akhir', 'masa_mula', 'masa_akhir', 'lokasi', 'kump_sasaran', 'max_peserta', 'status' ];

      // protected $attributes = ['status' => 'Sedang Diproses'];

      protected $attributes = ['status' => 'Sedang Diproses' ];


      // protected $dates = ['tarikh_mula', 'tarikh_akhir'];

          /**
           * Get the event's id number
           *
           * @return int
           */
          public function getId() {
      		return $this->id;
      	}

        
          // public function getTitle()
          // {
          //     return $this->program;
          // }
          //
          // // /**
          // //  * Is it an all day event?
          // //  *
          // //  * @return bool
          // //  */
          // // public function isAllDay()
          // // {
          // //     return (bool)$this->all_day;
          // // }
          //
          // /**
          //  * Get the start time
          //  *
          //  * @return DateTime
          //  */
          // public function getStart()
          // {
          //     return $this->tarikh_mula;
          // }
          //
          // /**
          //  * Get the end time
          //  *
          //  * @return DateTime
          //  */
          // public function getEnd()
          // {
          //     return $this->tarikh_akhir;
          // }
          //
          //
          //

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function tempahan()
  {
    return $this->hasMany(Tempahan::class, 'tempahan_id');
  }



}
