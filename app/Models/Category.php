<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name_en', 
        'name_fr', 
        'name_ar', 
        'description_en', 
        'description_fr', 
        'description_ar'
    ];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }
}