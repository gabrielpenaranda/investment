<?php

namespace App\Models\system;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'name',
        'year',
        'month',
        'route',
        'published',
    ];
}
