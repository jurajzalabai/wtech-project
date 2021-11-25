<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function review(){
        return $this->hasMany(Review::class);
    }

    protected $fillable = [
            'title',
            'publisher',
            'description',
            'price',
            'number_of_pages',
            'rating',
            'sold_count',
            'publish_date',
            'reading_time',
            'binding_type',
            'language',
            'stock_level',
            'photo_path',
            'active',
            'author_id',
            'category_id',
    ];

}
