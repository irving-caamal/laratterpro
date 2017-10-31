@extends('layouts.app')

@section('content')
    <form action="/auth/facebook/register" method="POST">
        {{ csrf_field() }}
        <div class="card">
            <div class="card-block">
                <img src="{{ $user->avatar }}" alt="imgfacebookAvatar" class="img-thumbnail">
                <div class="card-block">
                    <div class="form-group">
                        <label for="name" class="form-control-label">
                            Nombre
                        </label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }} " readOnly/>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-control-label">
                            E-mail
                        </label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }} " readOnly/>
                    </div>

                    <div class="form-group">
                        <label for="username" class="form-control-label">
                            Username
                        </label>
                        <input type="username" class="form-control" name="username" value="{{ old('username') }}" placeholder="Type your Username"/>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection