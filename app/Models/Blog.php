<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    use HasFactory;
    public $show_blog = false;
    protected $payload;
    protected $listeners = [
        'show_blog' => 'show_blog'
    ];
    public function show_blog($payload = null)
    {
        $this->payload = $payload;
        $this->show_blog = true;
    }
    protected $appends = ['feature_image_url'];

    protected $fillable = ['title', 'description', 'feature_image', 'slug'];

    public function getFeatureImageUrlAttribute()
    {
        # feature_image_url
        if ($this->feature_image) {
            return asset('storage/blog-images/' . $this->feature_image);
        }
    }

    // public $timestamps = true;
}
