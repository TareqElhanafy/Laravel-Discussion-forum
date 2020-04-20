<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Reply;
use App\Notifications\BestReplyMarked;

use App\Http\Requests\CreateDiscussionRequest;



class DiscussionController extends Controller
{
  public function __construct(){
    $this->middleware('auth')->only(['create','store']);

  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('discussions.index')->with('discussions',Discussion::paginate(3));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discussions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiscussionRequest $request)
    {
        Discussion::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'channel_id'=>$request->channel_id,
            'slug'=>str_slug($request->title),
            'user_id'=>auth()->user()->id
        ]);
        session()->flash('success','Your discussion has been added successfully');
        return redirect(route('discussions.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Discussion $discussion)
    {
      return view('discussions.show')->with('discussion',$discussion);
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
    public function destroy($id)
    {
        //
    }
     public function reply(Discussion $discussion,Reply $reply){

       $discussion->update([
         'reply_id'=>$reply->id
       ]);
       $reply->user->notify(new BestReplyMarked($discussion));

       session()->flash('success','Marked as best reply');
       return redirect()->back();
    }
}
