<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRequest extends Model
{
    protected $table='user_requests';
    protected $fillable = [
        "subject",
        "message"
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
