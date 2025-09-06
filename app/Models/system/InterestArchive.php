<?php

namespace App\Models\system;

use Illuminate\Database\Eloquent\Model;

class InterestArchive extends Model
{
    protected $fillable = [
        'year',
        'month',
        'interest_amount',
        'investment_amount',
        'rate',
        'investment_serial',
        'serial',
        'investment_archive_id',
    ];

    public function investment_archive()
    {
        return $this->belongsTo(InvestmentArchive::class);
    }
}
