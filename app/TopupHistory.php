<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopupHistory extends Model
{
    
    public function contact(){
        return $this->belongsTo(TopupContact::class,'contact_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
