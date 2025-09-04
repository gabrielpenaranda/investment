<?php

namespace App\Models\system;

use Illuminate\Database\Eloquent\Model;

class InvestmentChange extends Model
{
    protected $fillable = [
        'amount',
        'activation_date',
        'deactivation_date',
        'rate',
        'interests',
        'investment_id',
    ];

    public function investment()
    {
        return $this->belongsTo(Investment::class);
    }
}
