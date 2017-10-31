@extends('layouts.app')
@section('content')

    <h1>
        Conversación con
        {{ $conversation->users->except($user->id)->implode('name',',') }}
    </h1>


    @foreach($conversation->PrivateMessage as $message)
        <div class="card">
            <div class="card-header">
                <strong>{{ $message->user->name  }}</strong> dijo ...
            </div>
            <div class="card-block">
                {{ $message->message  }}
            </div>
            <small class="card-footer">
                {{ $message->created_at->diffForHumans() }}
            </small>
        </div>
    @endforeach

@endsection