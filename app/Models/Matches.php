<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    use HasFactory;
    protected $table = 'matches'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'local_id',
        'guest_id',
        'date',
        'result',
      ];


      public function teamLocal()
    {
        return $this->belongsTo(Teams::class, 'local_id');
    }

    public function teamGuest()
    {
        return $this->belongsTo(Teams::class, 'guest_id');
    }
}
