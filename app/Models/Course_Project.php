<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_Project extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
