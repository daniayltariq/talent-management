<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PicklistUser extends Model
{

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
