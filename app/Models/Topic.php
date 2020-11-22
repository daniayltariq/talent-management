<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use HasFactory,SoftDeletes;
  
	protected $primaryKey = 'id';

    protected $fillable = [
     	 'topic_category_id',
         'user_id',
         'title',
         'image',
         'meta_title',
        'slug',
     	'content'
     ];

     public function category()
    {
        return $this->belongsTo(TopicCategory::class,'topic_category_id');
    }

     public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function likes()
    {
        return $this->hasMany(TopicLike::class,'topic_id');
    }

    public function comments()
    {
        return $this->hasMany(TopicComment::class,'topic_id');
    }
}
