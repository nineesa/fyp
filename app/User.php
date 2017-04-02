<?php

namespace App;
use App\Post;
use App\Pendaftaran;
use App\Tempahan;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $fillable = ['name', 'phone', 'email', 'password'];


    public function post()
    {
      return $this->hasMany(Post::class);
    }
    public function likes()
    {
      return $this->belongsToMany(Post::class, 'likes');
    }
    protected $hidden = [
      'password', 'remember_token',
    ];
    public function alreadyliked(Post $post)
    {
      return $post->liked->contains('user_id', $this->id);
    }

      public function tempahan()
      {
        return $this->hasMany(Tempahan::class, 'user_id');
      }
}
