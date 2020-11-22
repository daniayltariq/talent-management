<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Referal extends Model
{
    use SoftDeletes;
    protected $table='referal';
    protected $fillable = [
    ];

    public function referrer()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }


}
