<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable /* implements MustVerifyEmail */
{
    use HasFactory, Notifiable;
    use HasRoles;
    use Billable;
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
}
