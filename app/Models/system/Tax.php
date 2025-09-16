<?php

namespace App\Models\system;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Tax extends Model
{
    protected $fillable = [
        'year',
        'earnings',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
