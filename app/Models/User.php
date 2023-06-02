<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'photo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getRouteKeyName()
    {
        return 'name';
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
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
        return Notification::where('type','user')->where('user_id',$this->id)->where('seen',false)->count();
    }
    public function getNotificationsAttribute(){
        return Notification::where('type','user')->where('user_id',$this->id)->latest()->take(5)->get();
    }
}
