<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopupContact extends Model
{
    
    public function groups()
    {
        return $this->belongsToMany('\App\Tag', 'tag_groups_users', 'topupcontact_id', 'tag_id')->withTimestamps();
    }
    
}
