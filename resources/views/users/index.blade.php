@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header">Notifications</div>

                <div class="card-body">
                <ul class="list-group">
                  @foreach($notifications as $notification)
                  <li class="list-group-item">
@if($notification->type === 'App\Notifications\NEWREPLYADDED')
              <p>New reply added to your discussion</p><strong>{{$notification->data['discussion']['title']}}</strong>
              <a href="{{route('discussions.show',$notification->data['discussion']['slug'])}}" class="float-right btn btn-info">View Discussion</a>
              @endif
              @if($notification->type==='App\Notifications\BestReplyMarked')
                <p>Your reply marked as best reply to this discussion </p><strong>{{$notification->data['discussion']['title']}}</strong>
<a href="{{route('discussions.show',$notification->data['discussion']['slug'])}}" class="btn btn-info float-right">View discussion</a>
@endif
                  </li>
                  @endforeach
                  {{$notifications->links()}}
                </ul>
                </div>

            </div>
@endsection
