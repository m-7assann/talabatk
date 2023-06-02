<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable=['value','review','user_id','meal_id','resturant_id'];
    protected $with = ['user'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function meal(){
        return $this->belongsTo(Meal::class);
    }
}
