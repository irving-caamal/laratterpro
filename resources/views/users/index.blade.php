@extends('layouts.app')
@section('content')
    <h1>
        {{ $user->name }}
    </h1>

    <a href="{{ $user->username }}/follows" class="btn btn-link">
        Sigue a
        <span class="badge badge-success">
            {{ $user->follows->count() }}
        </span>
    </a>

    <a href="{{ $user->username }}/followers" class="btn btn-link">
        Seguidores
        <span class="badge badge-success">
            {{ $user->followers->count() }}
        </span>
    </a>
    @if(Auth::check())
        <div class="form-group">
           @if(Gate::allows('dms', $user))
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalDMSend">
                    Send a DM
                </button>
           @endif
            <hr>
            @if(Auth::user()->isFollowing($user))
                <form action="/{{ $user->username }}/unfollow" method="POST">
                    {{ csrf_field() }}

                    @if(session('success'))
                        <span class="text-success">
                    {{ session('success') }}
                </span>
                    @endif

                    <button class="btn btn-danger text-center">Unfollow</button>
                </form>
            @else
                <form action="/{{ $user->username }}/follow" method="POST">
                    {{ csrf_field() }}
                    @if(session('success'))
                        <span class="text-success">
                    {{ session('success') }}
                </span>
                    @endif
                    <button class="btn btn-primary text-center">Follow</button>
                </form>
            @endif
            @endif
        </div>

        <div class="row">
            @foreach($user->messages as $message)
                <div class="col-6">
                    @include('messages.message')
                </div>
            @endforeach
        </div>

        <div class="modal fade" id="ModalDMSend" tabindex="-1" role="dialog" aria-labelledby="ModalDMSend"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Enviar Direct Message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                            <form action="/{{ $user->username }}/dms" class="from-control" method="POST">
                                {{ csrf_field() }}
                                <input type="text" class="form-control" name="message">
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-success">
                                Enviar DM
                            </button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
@endsection