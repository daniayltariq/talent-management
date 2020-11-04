<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;

    protected $table='profile';

    protected $fillable = [
        'name',
        'slug',
        'stripe_plan',
        'cost',
        'unique_url',
        'contact_info',
        'pictures',
        'resume',
        'social_links',
        'email_me',
        'short_message',
        'community_access',
        'apply_now',
        'agent_contact',
        'training_invitation',
        'inductry_invitation',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

}
