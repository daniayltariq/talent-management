<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicComment extends Model
{
    use HasFactory;

    public function user(){

    	return $this->belongsTo(User::class,'user_id');

    }

    public function parentComment()
    {
    	return $this->belongsTo(self::class, 'parent_id')->withDefault([
            null
        ]);
    }

    public function childComment()
    {
    	return $this->hasMany(self::class,'parent_id');
    }

}
