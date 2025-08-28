<?php

namespace App\Models\system;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Str;


class Investment extends Model
{

    protected $fillable = [
        'investment_amount',
        'opening_date',
        'closing_date',
        'is_active',
        'user_id',
        'product_id',
        'serial',
    ];

     /**
     * Genera un UUID antes de crear el modelo
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->serial) {
                $model->serial = (string) Str::uuid();
            }
        });
    }

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
