<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        'title_en', 
        'title_fr', 
        'title_ar', 
        'description_en', 
        'description_fr',
        'description_ar', 
        'front_image',
    ];
}