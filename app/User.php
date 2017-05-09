<?php

namespace App;
use App\Post;
use App\Pendaftaran;
use App\Tempahan;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;




class User extends Authenticatable
{
    use Notifiable;

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

      public function roleCheck($role = null){
        if ($role){
            return $this->role == $role; //userRole kena sama dengan dalam database
        }
        return $this->role;
    }
}
