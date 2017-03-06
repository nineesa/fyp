<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
  // protected $fillable = ['program'];
  // protected = ['penerangan_program'];
  // protected $fillable = ['tarikh'];
  // protected $fillable = ['masa'];
  // protected $fillable = ['lokasi'];
  // protected $fillable = ['tempoh_latihan'];
  // protected $fillable = ['kump_sasaran'];
  // protected $fillable = ['max_peserta'];


  public function user()
  {
    return $this->belongsTo(User::class);
  }

}
