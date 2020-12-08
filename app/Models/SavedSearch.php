<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/* use Illuminate\Database\Eloquent\SoftDeletes; */

class SavedSearch extends Model
{
    protected $table='saved_search';
    protected $fillable = [
        "name",
        "value"
    ];
}
