<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function video()
    {
        return $this->hasOne('App\Models\Video');
    }
}
