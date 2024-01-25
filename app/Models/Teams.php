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
        'players',
        'trainer',
      ];

      public function matches()
    {
        return $this->hasMany(Matches::class, 'local_team_id');//relación para obtener todos los partidos asociados con ese equipo:
    }
}
