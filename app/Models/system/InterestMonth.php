<?php

namespace App\Models\system;

use Illuminate\Database\Eloquent\Model;

class InterestMonth extends Model
{
    protected $fillable = [
        'year',
        'month',
        'processed',
        'approved'
    ];
}
