<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proverb extends Model
{
    use HasFactory;

    protected $fillable =[
        'name','language_id'
    ];

    public $timestamps = true;


    public function meanings(){

        return $this->hasMany(ProverbMeaning::class);

    }

    public function comments(){

        return $this->hasMany(ProverbComment::class);

    }
}
