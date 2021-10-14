<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'name', 'description', 'picture'
    // ];

    protected $guarded = [];

    public function course()
    {
        return $this->hasMany('App\Models\Course');
    }
}
