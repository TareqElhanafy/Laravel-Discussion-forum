@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header">
                  <div class="d-flex justify-content-between">
                  <div class="">
                    <img src="{{Gravatar::src($discussion->user->email,50)}}" style="border-radius:50%" alt="">
                    <span class="mr-4"><strong>{{$discussion->user->name}}</strong></span>
                  </div>

                  </div>

                </div>

                <div class="card-body">
              <div class="">
                <div class="text-center">
                  <strong>{{$discussion->title}}</strong>

                <hr>
                {{$discussion->content}}
                </div>
              </div>
              <br>
              @if($discussion->bestreply)
              <div class="">
                <strong>Best Reply</strong>
                <hr>
                <p>{{$discussion->bestreply->reply}}</p>
              </div>
              @endif
                </div>

            </div>
            @foreach($discussion->replies()->paginate(3) as $reply)

            <div class="card">
              <div class="card-header">
                Reply {{$reply->id}}

              </div>

              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <div class="">
                    <img src="{{Gravatar::src($discussion->user->email,50)}}" style="border-radius:50%" alt="">
                    <span class="mr-4"><strong>{{$reply->user->name}}</strong></span>
                    <hr>
                  <p> {{$reply->reply}}</p>

                  </div>
<div class="float-right">

@auth
@if(auth()->user()->id===$discussion->user_id)
<form class="" action="{{route('discussions.bestreply',[$discussion->slug,$reply->id])}}" method="post">
@csrf
<button type="submit" class="btn btn-primary">Mark As best reply</button>

</form>

@endif
@endauth
<br>
@auth
@if(auth()->user()->id === $reply->user_id||auth()->user()->id === $discussion->user_id)
  <form class="" action="{{route('replies.destroy',[$discussion->slug,$reply->id])}}" method="post">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>

  </form>
@endif
@endauth
</div>
</div>



              </div>
            </div>
                @endforeach
                {{$discussion->replies()->paginate(3)->links()}}
            <div class="card mt-4">
              <div class="card-header">
                Add Reply
              </div>
              <div class="card-body">
                @if($errors->any())
                <div class="alert alert-danger">
                  <ul class="list-group">
                    @foreach($errors->all() as $error)
                    <li class="list-group-item">{{$error}}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
                <form class="" action="{{route('replies.store',$discussion->slug)}}" method="post">
                  @csrf
                  <div class="form-group">
                    <textarea name="reply" class="form-control" rows="8" cols="8"></textarea>

                  </div>
                  <div class="form-group">
                    <button type="submit" name="button" class="btn btn-success">Add reply</button>
                  </div>
                </form>
              </div>
            </div>
@endsection
