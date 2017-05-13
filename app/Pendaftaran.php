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

          /**
           * Get the event's id number
           *
           * @return int
           */
          public function getId() {
      		return $this->id;
      	}

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function tempahan()
  {
    return $this->hasMany(Tempahan::class, 'tempahan_id');
  }
}
