<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubsubCategory extends Model
{
    use HasFactory;

    protected $table = 'subsubcategories';

    protected $fillable = [
        'name_en', // Nom en anglais
        'name_fr', // Nom en français
        'name_ar', // Nom en arabe
        'description_en', // Description en anglais
        'description_fr', // Description en français
        'description_ar', // Description en arabe
        'category_id',
        'subcategory_id',
        'photo',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }
}