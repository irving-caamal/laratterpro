<img src="{{ $message->image }}" alt="thumb img" class="img-thumbnail">
<p class="card-text">
<div class="text-muted">
    <strong>Writted by:</strong>
    <a href="/{{ $message->user->username }}">
        <small>{{ $message->user->username }}</small>
    </a>
    <hr>
    <small>{{ $message->user->email }}</small>
</div>
{{ $message->content }}
<a href="/messages/{{ $message['id'] }}">
    Read More
</a>
</p>
<div class="card-text text-muted float-right">
    {{ $message->created_at->diffForHumans() }}
</div>

