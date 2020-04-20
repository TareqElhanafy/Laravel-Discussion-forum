@extends('layouts.app')

@section('content')
@foreach($channel->discussions()->paginate(3) as $discussion)
            <div class="card">
                <div class="card-header">
                  <div class="d-flex justify-content-between">
                  <div class="">
                    <img src="{{Gravatar::src($discussion->user->email,50)}}" style="border-radius:50%" alt="">
                    <span class="mr-4"><strong>{{$discussion->user->name}}</strong></span>
                  </div>
                  <div class="">
                    <a href="{{route('discussions.show',$discussion->slug)}}" class="btn btn-primary">View Discussion</a>
                  </div>
                  </div>

                </div>

                <div class="card-body">
                <div class="text-center">
                  <strong>{{$discussion->title}}</strong>
                </div>
                </div>
                @endforeach

                {{$channel->discussions()->paginate(3)->links()}}
            </div>

@endsection
