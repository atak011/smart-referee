<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = [
        'home', 'away', 'home_score', 'away_score', 'league', 'year', 'result_score','is_cl','is_ul','result'
    ];
}
