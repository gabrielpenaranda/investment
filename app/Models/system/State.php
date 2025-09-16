<?php

namespace App\Models\system;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class State extends Model
{
    protected $fillable = [
        'name',
        'code',
        'country_id',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
