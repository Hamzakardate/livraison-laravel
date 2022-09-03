<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function Infoclient()
   {
    return $this->hasOne("App\Infoclient");
   }
}
