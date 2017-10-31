@extends('layouts.app')

@section('content')
    <div class="row">
        <section class="col-lg-2 col-md-3 col-sm-0">
        </section>
        <section class="col-lg-8 col-md-8 col-sm-12" id="form_register">
            <div class="card card-outline-primary mb-3">
                <div class="card-header">
                    <h4 class="panel-title text-center">Login</h4>
                </div>
                <section class="card-block card-outline-primary mb-3 ml-2 mr-2 mt-2">
                    <form class="" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label for="password" class="form-control-label">E-mail</label>

                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}"
                                       required autofocus/>
                            </div>
                            @if ($errors->has('email'))
                                <span class="form-control-feedback">
                                <strong>
                                    {{ $errors->first('email') }}
                                </strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <label for="password" class="form-control-label">
                                Password
                            </label>

                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="form-control-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        <a class="btn btn-link pull-right" href="{{ route('password.request') }}">
                            <small>Forgot Your Password?</small>
                        </a>
                        <div class="form-group">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-success btn-block">
                                    Login
                                </button>


                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 ">
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" name="remember" {{ old('remember') ? 'checked' : '' }} />
                                       <small> Remember Me</small>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                    <small>or login via</small>
                    <section class="offset-2"></section>
                  <section>
                      <a href="/auth/facebook" class="btn btn-primary col-4">
                          Facebook
                      </a>
                      <a href="/auth/facebook" class="btn btn-info col-4">
                          Twitter
                      </a>
                  </section>
                </div>
                <div class="card-footer"></div>
            </div>
        </section>
    </div>

@endsection
