<?php

namespace App\Models\system;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name',
        'code',
    ];

    public function states()
    {
        return $this->hasMany(State::class);
    }
}
