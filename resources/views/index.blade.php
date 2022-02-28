@extends('nav.index')

@section('container')

    <h1 class="mb-3 text-center text-warning">{{ $title }}</h1>
    <hr>
    <div class="d-flex justify-content-center mb-5">
        <div class="col-md-6">
            <form action="/">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
            <div class="input-group mb-3">
                <input type="search" class="form-control" name="search" placeholder="Search...">
                <button class="btn btn-warning" type="submit">Search</button>
            </div>
            </form>
        </div>
    </div>

 @if ($posts->count())
<div class="container">
    @foreach ($posts as $post )
    <div class="d-flex justify-content-center">
    <div class="card w-75 mb-4">
        <div class="position-absolute px-3 py-2 text-white bg-warning">
            <a href="/?category={{ $post->category->slug }}" class="text-white text-decoration-none">
            {{ $post->category->name }}</a></div>
            @if ($post->image)
            <img src="{{ asset('storage/'. $post->image) }}"
            alt="{{ $post->category->name }}" class="img-fluid">
            @else
            <img src="https://source.unsplash.com/300x200?{{ $post->category->name }}"
            class="card-img-top" alt="{{ $post->category->name }}" >
            @endif

            <div class="text-left">
                <img src="{{ asset('storage/'. $post->image) }}"  width="32" height="32" class="rounded-circle">
                <small class="text-muted">
                <a href="/?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>
                {{ $posts[0]->created_at->diffForHumans() }}</small>
            </div>
        <div class="card-body">
          <h5 class="card-title text-center">{{ $post->title }}</h5>
          <p class="card-text">{{ $post->excerpt}}
            <a href="/posts/{{ $post->slug }}">Read more</a>
          </p>
        </div>
      </div>
    </div>
    @endforeach
</div>
    @else
    <p class="text-center fs-4">No post found</p>
    @endif
    <div class="d-flex justify-content-center">
    {{ $posts->links() }}
    </div>
@endsection

