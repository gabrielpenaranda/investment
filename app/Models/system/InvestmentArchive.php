<?php

namespace App\Models\system;

use Illuminate\Database\Eloquent\Model;

class InvestmentArchive extends Model
{
    protected $fillable = [
        'investment_amount',
        'name',
        'email',
        'product_name',
        'product_rate',
        'activation_date',
        'deactivation_date',
        'serial',
    ];

    public function interest_archives()
    {
        return $this->hasMany(InterestArchive::class);
    }

}
