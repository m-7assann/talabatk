<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['user_id','total','status','payment_status','address','notes','name','mobile','meal_id','quantity','price','resturant_id'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function meal(){
        return $this->belongsTo(Meal::class);
    }
    public function resturant(){
        return $this->belongsTo(Resturant::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}
