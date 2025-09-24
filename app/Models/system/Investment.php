<?php

namespace App\Models\system;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Investment extends Model
{
    protected $fillable = [
        'investment_amount',
        'initial_amount',
        'name',
        'email',
        'is_active',
        'user_id',
        'product_id',
        'serial',
        'activation_date',
        'deactivation_date',
        'capitalize',
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

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function investment_changes()
    {
        return $this->hasMany(InvestmentChange::class);
    }

    public function account_statements()
    {
        return $this->hasMany(AccountStatement::class);
    }

    public function investment_balance()
    {
        return $this->hasOne(InvestmentBalance::class);
    }
}
