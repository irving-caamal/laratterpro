@extends('layouts.app')
@section('content')
    <div class="row">
        <section class="col-lg-2 col-md-3 col-sm-0">
        </section>
        <section class="col-lg-8 col-md-8 col-sm-12" id="form_register">
            <div class="card card-outline-primary mb-3">
                <div class="card-header bg-primary text-white">
                    <h4 class="panel-title text-center">Formulario de Registro.</h4>
                </div>
                <div class="card-block card-outline-primary mb-3 ml-2 mr-2 mt-2">
                    <form method="POST" action="{{ route('register') }}"  >
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label for="name" class="pull-left form-control-feedback">
                                Names
                            </label>
                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input id="name" type="text" class="form-control" name="name"
                                       value="{{ old('name') }}" required autofocus/>
                                @if ($errors->has('name'))
                                    <span class="form-control-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('username') ? ' has-danger' : '' }}">
                            <label for="username" class="form-control-feedback">
                                Username
                            </label>
                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input type="text" name="username" id="username" class="form-control"
                                       value="{{ old('username') }}" required>
                                @if ($errors->has('username'))
                                    <span class="form-control-feedback">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label for="email" class="form-control-feedback">
                                E-Mail Address
                            </label>

                            <div class="input-group">
                                <span class="input-group-addon">@</span>

                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}"
                                       required>

                                @if ($errors->has('email'))
                                    <span class="form-control-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <label for="password" class="form-control-feedback">Password</label>

                            <div class="input-group">
                                <span class="input-group-addon">@</span>

                                <input id="password" type="password" class="form-control" name="password"
                                       value="{{ old('password') }}" required>

                                @if ($errors->has('password'))
                                    <span class="form-control-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 form-control-feedback">Confirm
                                Password</label>

                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation"
                                       required>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group mt-3 mb-3">
                                <button type="submit" class="btn btn-success btn-block">
                                    Registrarse
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </section>
    </div>
@endsection
