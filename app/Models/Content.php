<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['content'];


    public function scopeContent($query)
    {
        return $query->first();
    }
}
