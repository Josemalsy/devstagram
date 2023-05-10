<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;

  protected $fillable = [
    'titulo',
    'descripcion',
    'imagen',
    'user_id',
  ];

  public function user()
  {
    return $this->belongsTo(User::class)->select(['name', 'username']);
  }

  public function comentarios(){
    return $this->hasMany(Comentario::class);
  }

  public function likes(){
    return $this->hasMany(Like::class);
  }

  public function checkLike(User $user){

    //Comprueba en la tabla de likes, si en el post en el que estamos el usuario ya está registrado como que le dio me gusta
    return $this->likes->contains('user_id', $user->id);
  }
}
