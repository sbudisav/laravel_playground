@extends ('layout')
@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.0/css/bulma.min.css">
@endsection
@section ('content')

<div class="flex-center position-ref full-height">
    <div class="content">
        <h2> 
            New Post
        </h2>
            <form method="POST" action="/posts">
            @csrf
                <div class="field">
                    <label class="label" for="title">Title</label>

                    <div class="control">
                        <input class="input post-text-box" type="text" name="title" id="title">
                        @error('title')
                            <p class="help is-danger">{{ $errors->first('title') }}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="body">Body</label>

                    <div class="control">
                        <textarea class="post-text-box textarea" name="body" id="body"></textarea>
                        @error('title')
                            <p class="help is-danger">{{ $errors->first('title') }}</p>
                        @enderror
                    </div>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>
            </form>
    </div>
</div>
@endsection