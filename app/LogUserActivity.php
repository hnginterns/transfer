<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogUserActivity extends Model
{
    protected $fillable = ['subject', 'url', 'method', 'ip', 'user_id', 'os', 'browser'];
}
