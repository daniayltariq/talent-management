<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialLink extends Model
{
    protected $table='social_links';
    

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
