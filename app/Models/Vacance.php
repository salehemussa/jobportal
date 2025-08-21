<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacance extends Model
{
    //

        protected $fillable = [
        'title',
        'description',
    ];


       public function user(){
       return $this->belongsTo(User::class);
    }

      public function applications(){
       return $this->hasMany(application::class);
    }

    
}
