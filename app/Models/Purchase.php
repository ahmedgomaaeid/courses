<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['student_id', 'course_id', 'finnished_at'];
    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
}
