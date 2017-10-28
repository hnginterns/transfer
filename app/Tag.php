<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    
    public function users()
    {
        return $this->belongsToMany('\App\TopupContact', 'tag_groups_users', 'tag_id', 'topupcontact_id')->withTimestamps();
    }
}
