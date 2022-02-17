<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Espisodio extends Model
{
    protected $fillable = ['numero'];
    public $timestamps = false;
    
    public function temporada ()
    {
        return $this->belongsTo(Temporada::class);
    }
}
