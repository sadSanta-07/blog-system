<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model {
    protected $fillable = [
        'title', 'slug', 'short_description',
        'content', 'image', 'category_id', 'published_date'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}