<?php

namespace App\Models\system;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'date',
        'month',
        'year',
        'description',
        'amount',
        'serial',
        'investment_id',
    ];

    public function investment()
    {
        return $this->belongsTo(Investment::class);
    }
}
