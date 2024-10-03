<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = ['name_en', 'name_fr', 'name_ar', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subsubcategories()
    {
        return $this->hasMany(SubsubCategory::class);
    }
}