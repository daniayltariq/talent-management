<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'stripe_plan',
        'cost',
        'unique_url',
        'contact_info',
        'pictures',
        'audios',
        'videos',
        'resume',
        'social_links',
        'email_me',
        'short_message',
        'community_access',
        'apply_now',
        'agent_contact',
        'free_guide',
        'training_invitation',
        'inductry_invitation',
        'description',
    ];
    
    protected $casts = ['features' => 'array'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
