<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CandidateSkill extends Model
{
    use SoftDeletes;
    protected $table='candidate_skills';
    protected $fillable = [
    ];

    public function candidate()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function skill()
    {
        return $this->belongsTo('App\Models\Skill','skill_id');
    }

}
