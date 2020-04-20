@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header">New Discussion</div>

                <div class="card-body">
                  @if($errors->any())
                  <div class="alert alert-danger">
                    <ul class="list-group">
                      @foreach($errors->all() as $$error)
                      <li class="list-group-item">{{$error}}</li>
                      @endforeach
                    </ul>
                  </div>
                  @endif
                  <form class="" action="{{route('discussions.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text"  class="form-control" name="title" value="" placeholder="discussion title">
                    </div>
                    <div class="form-group">
                      <label for="content">content</label>
                     <textarea name="content" class="form-control" rows="8" cols="80"></textarea>
               </div>
                    <div class="form-group">
                      <label for="Channel">Channel</label>
    <select class="form-control" name="channel_id">
  @foreach($channels as $channel)
  <option value="{{$channel->id}}">{{$channel->name}}</option>
  @endforeach
      </select>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit </button>
                      </div>
                  </form>
                </div>

            </div>
@endsection
