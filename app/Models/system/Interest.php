<?php

namespace App\Models\system;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $fillable = [
        'year',
        'month',
        'interest_amount',
        'rate',
        'name',
        'email',
        'investment_id',
        'serial',
        'approved',
        'condition',
        'status',
    ];

    public function investment()
    {
        return $this->belongsTo(Investment::class);
    }
}
