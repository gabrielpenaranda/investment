<?php

namespace App\Models\system;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['action', 'description', 'table_id', 'table_name', 'user_name', 'user_id', 'description'];

    public function register($log, $action, $table_id, $table_name, $user_name, $user_id, $description)
    {
        $log->action = $action;
        $log->table_id = $table_id;
        $log->table_name = $table_name;
        $log->user_name = $user_name;
        $log->user_id = $user_id;
        $log->description = $description;
        $log->save();
    }
}
