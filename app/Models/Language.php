<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable =[
        'name','code'
    ];

    public $timestamps = true;


    public function proverbs(){

        return $this->hasMany(Proverb::class);

    }
}
