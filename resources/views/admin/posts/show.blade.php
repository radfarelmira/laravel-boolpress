@extends('layouts.dashboard')

@section('content')
    <section>
        <h1>{{ $post->title }}</h1>

        <div class="mb-2"><strong>Slug:</strong> {{ $post->slug }}</div>
        
        <div class="mb-2"><strong>Categoria:</strong> {{ $category? $category->name : 'Nessuna' }}</div>

        <p>{{ $post->content }}</p>

        <div>
            <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">Modify post</a>
        </div>

        <div>
            <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger">Delete</button>
            </form>
        </div>

    </section>
@endsection