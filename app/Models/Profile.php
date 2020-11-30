<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;

    protected $table='profile';

    protected $fillable = [
        'legal_first_name',
        'legal_last_name',
        'email',
        'custom_link',
        'height',
        'feet',
        'weight',
        'eyes',
        'hairs',
        'neck',
        'waist',
        'sleves',
        'chest',
        'shoes',
        'address_1',
        'address_2',
        'zip',
        'country',
        'state',
        'city',
        'telephone',
        'mobile',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

}
