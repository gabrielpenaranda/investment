<?php

namespace App\Models\system;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Investment extends Model
{
    protected $fillable = [
        'investment_amount',
        'name',
        'email',
        'opening_date',
        'closing_date',
        'is_active',
        'user_id',
        'product_id',
        'serial',
        'activation_date',
        'deactivation_date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function interests()
    {
        return $this->hasMany(Investment::class);
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class);
    }

    public function investment_changes()
    {
        return $this->hasMany(InvestmentChange::class);
    }
}
