<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
  public function getRouteKeyName(){
    return 'slug';
  }
  protected $fillable=[
    'title','content','channel_id','slug','user_id','reply_id'
  ];

    public function channel(){
      return $this->belongsTo(Channel::class);
    }
    public function user(){
      return $this->belongsTo(User::class);
    }

    public function replies(){
      return $this->hasMany(Reply::class);
    }
    public function bestreply(){
      return $this->belongsTo(Reply::class,'reply_id');
    }
}
