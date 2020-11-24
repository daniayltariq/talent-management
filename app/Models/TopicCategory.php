<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicCategory extends Model
{
    use HasFactory;

    public function topics(){

    	return $this->hasMany(Topic::class,'topic_category_id');

    }

    public function comments()
    {
        return $this->hasManyThrough(TopicComment::class, Topic::class);
    }

    public function likes()
    {
        return $this->hasManyThrough(TopicLike::class, Topic::class);
    }
}
