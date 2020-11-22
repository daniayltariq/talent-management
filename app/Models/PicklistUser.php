<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PicklistUser extends Model
{
    use SoftDeletes;

    protected $table='picklist_user';
    protected $fillable = [
    ];
    
    protected $casts = ['features' => 'array'];

    public function member()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function picklist()
    {
        return $this->belongsTo('App\Models\Picklist','picklist_id');
    }

}
