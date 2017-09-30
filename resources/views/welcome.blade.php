@extends("layouts.app")

@section("content")
    <div class="jumbotron text-center">
        <h1>
            Laratter
        </h1>

        <nav>
            <ul class="nav nav-pills">
                <li clas="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
            </ul>
        </nav>

    </div>

    <div class="row">
        <form action="/messages/create" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{--{{dd($errors)}}--}}
            <div class="form-group @if ($errors->has('message')) has-danger @endif">
                <input type="text" name="message" class="form-control" placeholder="Coloca un mensaje..."/>
                @if( $errors->has('message') )
                    @foreach($errors->get('message') as $error)
                        <div class="form-control-feedback">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                <input type="file" class="form-control-file" name="image">
            </div>
        </form>
    </div>

    <div class="row">
        @forelse($messages as $message)
            <div class="col-md-6">
                @include('messages.message')
            </div>
        @empty
            <p>
                Empty
            </p>
        @endforelse
        <hr>
        @if( count($messages) )
            <div class="mt-2 mx-auto">
                {{ $messages->links('pagination::bootstrap-4') }}
            </div>
        @endif
    </div>

@endsection