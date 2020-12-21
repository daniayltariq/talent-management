<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Lab404\Impersonate\Models\Impersonate;
use Spatie\Permission\Traits\HasRoles;
use Carbon\Carbon;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    use HasRoles;
    use Billable;
    use Impersonate;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'f_name', 'l_name', 'gender', 'dob', 'phone', 'email', 'password', 'country', 'city', 'state', 'h_adress_1', 'h_adress_2', 'zipcode',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Accessor for Age.
     */
    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['dob'])->age;
    }

    public function routeNotificationForClickSend()
    {
        return $this->phone;
    }

    public function doesNotHaveSubscription()
    {
        $subs= $this->subscriptions()->active()->get();
        if (!is_null($subs) && $subs->count()>0) {
            $status=false;
        }
        else{
            $status=true;
        }
        return $status;
    }

    public function hasStripeId()
    {
        return $this->stripe_id;
    }

    public function picklist()
    {
        return $this->hasMany('App\Models\Picklist','user_id');
    }

    public function profile()
    {
        return $this->hasOne('App\Models\Profile','user_id');
    }

    public function experience()
    {
        return $this->hasMany('App\Models\Experience','candidate_id');
    }

    public function skills()
    {
        return $this->hasMany('App\Models\CandidateSkill','candidate_id');
    }

    public function social_links()
    {
        return $this->hasMany('App\Models\SocialLink','user_id');
    }

    public function referal_code()
    {
        return $this->hasOne('App\Models\Referal','user_id');
    }

    public function referrer()
    {
        return $this->belongsTo('App\Models\Referal','referrer_id');
    }

    public function attachments()
    {
        return $this->hasMany('App\Models\Attachment','user_id');
    }

    public function saved_search()
    {
        return $this->hasMany('App\Models\SavedSearch','user_id');
    }
}
