<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;

class Category extends Model
{
    protected $table="categories";
    protected $fillable =[
        'name',
        'description',
        'image'
        
    ];
     public function subcategories(){
        return $this->hasMany(Subcategory::class,'cat_id','cat_name');
     }
}
