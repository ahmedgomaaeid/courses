<?php

namespace App\Models;

use App\Models\Catogry\SubCategory;
use App\Models\Teacher;
use App\Models\Admin;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = ['name', 'image', 'price', 'teacher_id', 'category_id', 'publisher_type','publisher_id','status'];
    public function category()
    {
        return $this->belongsTo(SubCategory::class,'category_id');
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'publisher_id');
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class,'publisher_id');
    }
    public function getStatusAttribute($value)
    {
        return $value == 1 ? 'مفعل' : 'غير مفعل';
    }
    public function getPublisherTypeAttribute($value)
    {
        return $value == 1 ? 'ادمن' : 'معلم';
    }
    public function steacher()
    {
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
    public function purchases()
    {
        return $this->hasMany(Purchase::class,'course_id');
    }
}
