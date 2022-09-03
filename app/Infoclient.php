<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infoclient extends Model
{
    public function Member()
    {
    return $this->belongsTo("App\Sale");
    }
    
}
