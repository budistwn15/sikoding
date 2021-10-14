<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = "courses";
    protected $primaryKey = "id";
    protected $guarded = [];

    public function skill()
    {
        return $this->belongsTo('App\Models\Skill');
    }

    public function theory()
    {
        return $this->hasMany('App\Models\Theory');
    }

    public function tool()
    {
        return $this->hasMany('App\Models\Tool');
    }

    public function project()
    {
        return $this->hasMany('App\Models\Project');
    }

    public function course_project()
    {
        return $this->hasMany('App\Models\Course_Project');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
