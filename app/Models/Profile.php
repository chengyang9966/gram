<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        "title","description","url","user_id","image"
    ];
    
    public function profileImage(){
        return '/storage/'. ($this->image ? $this->image : 'profile/6PNSQWTRpulpdTQzJYZGI6gq0NTPtl3bTqC06wMo.jpg');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }


}
