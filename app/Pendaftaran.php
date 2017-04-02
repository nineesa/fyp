<?php

namespace App;
//use App\Traits\Enums;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
  //use Enums;

  //protected $enumStatuses = ['Sedang Diproses', 'Lulus', 'Tidak Lulus'];

  /**
     * [$table description]
     * @var string
     */
    protected $table = 'pendaftarans';
    /**
     * [$fillable description]
     * @var [type]
     */

  protected $fillable = ['penganjur', 'program', 'penerangan_program', 'tarikh_mula','tarikh_akhir', 'masa_mula', 'masa_akhir', 'lokasi', 'kump_sasaran', 'max_peserta', 'status' ];

      // protected $attributes = ['status' => 'Sedang Diproses'];



  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function tempahan()
  {
    return $this->hasMany(Tempahan::class, 'pendaftaran_id');
  }

}
