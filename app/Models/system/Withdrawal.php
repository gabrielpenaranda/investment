<?php

namespace App\Models\system;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Withdrawal extends Model
{
    protected $fillable = [
        'amount',
        'withdrawal_date',
        'investment_id',
        'investment_serial',
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

    public function investment()
    {
        return $this->belongsTo(Investment::class);
    }
}
