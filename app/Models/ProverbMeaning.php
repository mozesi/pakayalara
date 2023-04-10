<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProverbMeaning extends Model
{
    use HasFactory;

    protected $fillable =[
        'meaning_en','local_sentence','en_sentence','proverb_id'
    ];

    public $timestamps = true;
}
