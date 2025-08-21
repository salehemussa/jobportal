<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    //
    protected $fillable = [
           'user_id',
           'vacance_id',
           'cover_letter_path',
    ];

    public function user(){
       return $this->belongsTo(User::class);
    }

    public function vacance(){
       return $this->belongsTo(Vacance::class);
    }
}
