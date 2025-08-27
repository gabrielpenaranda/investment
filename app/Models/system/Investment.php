<?php

namespace App\Models\system;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\User;


class Investment extends Model
{
    use HasUuids;
    
    protected $fillable = [
        'investment_amount',
        'opening_date',
        'closing_date',
        'is_active',
        'user_id',
        'product_id',
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
}
