@extends ('layout')
@section ('content')

<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Laravel Blog Home
        </div>
    <div>
        @foreach ($posts as $post)
            <h2><a href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
            <p>{{$post->body}}</p>
        @endforeach
    </div>

    </div>
</div>
@endsection