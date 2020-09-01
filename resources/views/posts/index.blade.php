@extends ('layout')
@section ('content')

<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Laravel Blog Home
        </div>
        <div>
            @foreach ($posts as $post)
                <h2><a style="text-decoration:none;" href="{{ $post->path() }}">{{ $post->title }}</a></h2>
                <h4> By: {{ $post->user->name }} </h4>
                <p>{{$post->body}}</p><hr style="width: 600px">
            @endforeach

            <!-- 
            Could also use @forelse($posts as $post)
            This allows me to use a tag 
            @empty 
               <p> No posts found </p>
            @endforelse -->
        </div>
    </div>
</div>
@endsection