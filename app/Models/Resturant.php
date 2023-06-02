<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
class Resturant extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = ['name','email','password','mobile','telephone','photo','description','confirm','address','is_confirm','open_at','close_at'];
    protected $hidden = ['password','remember_token',];
    protected $casts = [ 'email_verified_at' => 'datetime',];
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

    public function meals(){
        return $this->hasMany(Meal::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function getPhotoAttribute($value){
        if ($value) {
            if (Storage::disk('public')->exists($value)) {
                return 'storage/'.$value;
            }
        }
        return 'image/avatar.png';
    }
    public function getUnseenNotificationCountAttribute(){
        return Notification::where('type','resturant')->where('user_id',$this->id)->where('seen',false)->count();
    }
    public function getNotificationsAttribute(){
        return Notification::where('type','resturant')->where('user_id',$this->id)->latest()->take(5)->get();
    }
    protected static function booted()
    {
        static::creating(function(Resturant $resturant) {
            $slug = Str::slug($resturant->name);
            $count = Resturant::where('slug', 'LIKE', "{$slug}%")->count();
            if ($count) {
                $slug .= '-' . ($count + 1);
            }
            $resturant->slug = $slug;
        });
    }
}
