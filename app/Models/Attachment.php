<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{
    use SoftDeletes;
    protected $table='attachments';

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

}
