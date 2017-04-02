<?php

namespace App;
use App\User;
use App\Pendaftaran;
use Illuminate\Database\Eloquent\Model;

class Tempahan extends Model
{
      protected $fillable = ['user_id', 'pendaftaran_id'];

      public function user()
      {
        return $this->belongsTo(User::class, 'user_id');
      }

      public function pendaftaran()
      {
        return $this->belongsTo(User::class, 'pendaftaran_id');
      }
}
