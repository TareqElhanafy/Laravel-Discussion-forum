<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable =[
      'reply','user_id','discussion_id'
    ];

    public function discussion(){
      return $this->belongsTo(Discussion::class);
    }
    public function user(){
      return $this->belongsTo(User::class);
    }
  
}
