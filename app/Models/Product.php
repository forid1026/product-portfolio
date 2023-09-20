<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id','id');
    }
    public function Sub_category(){
        return $this->belongsTo(SubCategory::class, 'sub_cat_id','id');
    }
}