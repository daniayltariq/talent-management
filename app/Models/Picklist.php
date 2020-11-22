<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Picklist extends Model
{
    use SoftDeletes;
    protected $table='picklist';
    protected $fillable = [
    ];
    
    protected $casts = ['features' => 'array'];

    public function agent()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function items()
    {
        return $this->hasMany('App\Models\PicklistUser','picklist_id');
    }

}
