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
                        <input 
                          class="input post-text-box" 
                          type="text" 
                          name="title" 
                          id="title"
                          value="{{ old('title') }}">

                        @error('title')
                            <p class="help is-danger">{{ $errors->first('title') }}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="body">Body</label>

                    <div class="control">
                        <textarea 
                          class="post-text-box textarea" 
                          name="body" 
                          id="body"
                          value="{{ old('body') }}"></textarea>

                        <!-- This error auto fills if the page needs to request for invalid input data -->
                        @error('body')
                            <p class="help is-danger">{{ $errors->first('body') }}</p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="body">Tags</label>

                    <div class="control">
                        <textarea 
                          class="post-text-box textarea" 
                          name="body" 
                          id="body"
                          value="{{ old('tag') }}"></textarea>

                        @error('body')
                            <p class="help is-danger">{{ $errors->first('tag') }}</p>
                        @enderror
                    </div>
                </div>

<!-- Hopefully can get a slugify type module to generate this, for now, input directly -->
                <div class="field">
                    <label class="label" for="slug">Slug</label>

                    <div class="control">
                        <input 
                          class="post-text-box input" 
                          name="slug" 
                          id="slug"
                          value="{{ old('slug') }}"></input>

                        @error('slug')
                            <p class="help is-danger">{{ $errors->first('slug') }}</p>
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