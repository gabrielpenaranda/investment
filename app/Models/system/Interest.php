<?php

namespace App\Models\system;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $fillable = [
        'year',
        'month',
        'interest_amount',
        'investment_amount',
        'investment_serial',
        'investment_id',
    ];

    public function investment()
    {
        return $this->belongsTo(Investment::class);
    }
}
