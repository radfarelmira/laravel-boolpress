@extends('layouts.dashboard')

@section('content')
    <section class="container">
        <h1>List of posts</h1>

        <div class="row row-cols-3">
            @foreach ($posts as $post)
                {{-- Single post --}}
                <div class="col">
                    <div class="card mt-2">
                        {{-- <img src="..." class="card-img-top" alt="..."> --}}
                        @if ($post->cover)
                            <img src="{{ asset('storage/' . $post->cover) }}" class="card-img-top" alt="{{ $post->title }}">
                        @endif
                        
                        <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::substr($post->content, 0, 150) }}...</p>
                        <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="btn btn-primary">Read the post</a>
                        </div>
                    </div>
                </div>
                {{-- End Single post --}}
            @endforeach
        </div>

        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </section>
@endsection