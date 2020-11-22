<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experience extends Model
{
    use SoftDeletes;
    protected $table='experience';

    public function user()
    {
        return $this->belongsTo('App\Models\User','candidate_id');
    }
}
