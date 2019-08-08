<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mcq extends Model
{
    protected $fillable = [
        'id', 'question', 'option1','option2','option3', 'option4', 'ans'
    ];
}
