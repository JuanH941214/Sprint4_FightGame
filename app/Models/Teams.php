<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    use HasFactory;
    protected $table = 'teams'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'name',
        'trainer',
        'power',
        'fighter_image',
        'user_id',
      ];

      public function matches()
      {
          return $this->hasMany(Matches::class, 'local_id');
      }
    public function guestMatches()
    {
        return $this->hasMany(Matches::class, 'guest_id');
    }
}
