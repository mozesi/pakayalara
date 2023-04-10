<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProverbComment extends Model
{
    use HasFactory;

    protected $fillable =[
        'comment_description','proverb_id','user_id'
    ];

    public $timestamps = true;
}
