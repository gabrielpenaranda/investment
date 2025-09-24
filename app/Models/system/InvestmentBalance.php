<?php

namespace App\Models\system;

use Illuminate\Database\Eloquent\Model;

class InvestmentBalance extends Model
{
    protected $fillable = [
        'balance',
        'investment_id',
    ];

    public function investment()
    {
        return $this->belongsTo(Investment::class);
    }
}
