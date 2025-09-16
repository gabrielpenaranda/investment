<?php

namespace App\Models\system;

use Illuminate\Database\Eloquent\Model;

class AccountStatement extends Model
{
    protected $fillable = [
        'date',
        'month',
        'year',
        'description',
        'amount',
        'balance',
        'type',
        'approved',
        'investment_id',
    ];

    public function investment()
    {
        return $this->belongsTo(Investment::class);
    }
}
