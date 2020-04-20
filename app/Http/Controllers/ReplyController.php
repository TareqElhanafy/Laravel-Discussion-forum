<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateReplyRequest;
use App\Notifications\NEWREPLYADDED;
use App\Notifications\BestReplyMarked;

use App\Reply;
use App\Discussion;
class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateReplyRequest $request,Discussion $discussion)
    {
        Reply::create([
          'reply'=>$request->reply,
          'discussion_id'=>$discussion->id,
          'user_id'=>auth()->user()->id
        ]);

        $discussion->user->notify(new NEWREPLYADDED($discussion));
        session()->flash('success','You reply is Added successfully');
        return redirect(route('discussions.show',$discussion->slug));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discussion $discussion,Reply $reply)
    {
        $reply->delete();
        return redirect (route('discussions.show',$discussion->slug));
    }
    public function bestreply(Reply $reply){

      $reply->update([
        'best_reply'=>1
      ]);
      $reply->user->notify(new BestReplyMarked($reply->discussion));
        session()->flash('success','Marked as best reply');
return redirect()->back();
    }

}
