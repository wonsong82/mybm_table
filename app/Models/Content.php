<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Content extends Model
{
    protected $fillable = ['content'];


    public function scopeContent($query)
    {
        /*$team = '';
        if(Auth::user()->hasRole('팀1')) $team = 1;
        elseif(Auth::user()->hasRole('팀2')) $team = 2;
        elseif(Auth::user()->hasRole('팀3')) $team = 3;
        elseif(Auth::user()->hasRole('팀4')) $team = 4;*/

        return $query->where('id', 1)->first();
    }

    public function scopeData($query)
    {
        return $query->where('id', 2)->first();
    }
}
