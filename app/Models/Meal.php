<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'resturant_id', 'category_id', 'discount', 'image','slug'];
    protected $with=['resturant'];
    protected $appends = [
        'rate',
    ];
     public function getRouteKeyName()
    {
        return 'slug';
    }
    public function getRateAttribute(){
        $sum = $this->reviews()->sum('value');
        $number_reviews = $this->reviews->count();
        if ($number_reviews > 0) {
            return $sum / $number_reviews;
        } else {
            return 0;
        }
    }
    public function resturant()
    {
        return $this->belongsTo(Resturant::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    protected static function booted()
    {
        static::creating(function (Meal $meal) {
            $slug = slug($meal->name);
            $count = Meal::where('slug', 'LIKE', "{$slug}%")->count();
            if ($count) {
                $slug .= '-' . ($count + 1);
            }
            $meal->slug = $slug;
        });

        static::updating(function (Meal $meal) {
            $slug = slug($meal->name);
            $count = Meal::where('slug', 'LIKE', "{$slug}%")->count();
            if ($count > 1) {
                $slug .= '-' . ($count + 1);
            }
            $meal->slug = $slug;
        });
    }
}
