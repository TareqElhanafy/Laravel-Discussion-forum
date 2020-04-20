<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
class ChannelController extends Controller
{

public function show(Channel $channel){

  return view('channels.show')->with('channel',$channel);
}


}
