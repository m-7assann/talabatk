<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $guarded  = [];

    

    public function markAsSeen()
    {
        $this->seen = true;
        if(!$this->seen_at){
            $this->seen_at = Carbon::now();
        }
        $this->save();

    }
    public static function send($title,$body,$type,$link = null,$user_id = null){
        static::query()->create(compact('title','body','type','link','user_id'));
    }
}
