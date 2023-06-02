<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['name','description','slug'];
    /* public function getRouteKeyName()
    {
        return 'slug';
    } */
    protected static function booted(){
        static::creating(function (Category $cat) {
            $slug = slug($cat->name);
            $count = Category::where('slug', 'LIKE', "{$slug}%")->count();
            if ($count) {
                $slug .= '-' . ($count + 1);
            }
            $cat->slug = $slug;
        });

        static::updating(function(Category $cat){
            $slug = slug($cat->name);
            $count = Category::where('slug', 'LIKE', "{$slug}%")->count();
            if ($count>1) {
                $slug .= '-' . ($count + 1);
            }
            $cat->slug = $slug;
        });
    }
}
