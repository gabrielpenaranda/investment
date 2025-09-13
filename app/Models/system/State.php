<?php

namespace App\Models\system;

use Illuminate\Database\Eloquent\Model;

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
}
