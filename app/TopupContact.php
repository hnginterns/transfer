<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopupContact extends Model
{
    
    public function groups()
    {
        return $this->belongsToMany('\App\Tag', 'tag_groups_users', 'topupcontact_id', 'tag_id')->withTimestamps();
    }

    public function topupHistory(){
        return $this->hasMany(TopupHistory::class, 'contact_id', 'id');
    }

    public function topupTotal(){
        return $this->topupHistory()->where('status', 'success');
        
    }
    
}
