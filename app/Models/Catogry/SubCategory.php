<?php

namespace App\Models\Catogry;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'name', 
        'main_category_id', 
    ];
    public function mainCategory()
    {
        return $this->belongsTo(MainCategory::class);
    }
}
