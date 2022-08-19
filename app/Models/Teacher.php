<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name', 
        'email', 
        'phone', 
        'description', 
        'course_access',
        'photo', 
        'approved',
        'status', 
        'password',
        'created_by', 
        'updated_by', 
    ];
    public function getStatusAttribute($value)
    {
        return $value == 1 ? 'مفعل' : 'غير مفعل';
    }
    public function getCourseAccessAttribute($value)
    {
        return $value == 1 ? 'مفعل' : 'غير مفعل';
    }
    public function teacher_categories()
    {
        return $this->hasMany('App\Models\Catogry\TeacherCategory', 'teacher_id');
    }
}
