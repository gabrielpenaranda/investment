<?php

namespace App\Models\system;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Withdrawal extends Model
{
    use HasUuids;

    protected $fillable = [
        'amount',
        'withdrawal_date',
        'investment_id',
        'investment_serial',
        'serial',
    ];

    public function investment()
    {
        return $this->belongsTo(Investment::class);
    }
}
