<?php

namespace App;
//use App\Traits\Enums;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
  //use Enums;

  //protected $enumStatuses = ['Sedang Diproses', 'Lulus', 'Tidak Lulus'];

  protected $fillable = ['penganjur', 'program', 'penerangan_program', 'tarikh_mula','tarikh_akhir', 'masa_mula', 'masa_akhir', 'lokasi', 'kump_sasaran', 'max_peserta' ];



  public function user()
  {
    return $this->belongsTo(User::class);
  }

}
