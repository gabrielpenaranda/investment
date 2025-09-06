<?php

namespace App\Models\system;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'annual_rate',
    ];

    public function investements()
    {
        return $this->hasMany(Investment::class);
    }
}
