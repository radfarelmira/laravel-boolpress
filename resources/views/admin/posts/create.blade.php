@extends('layouts.dashboard')

@section('content')
    <section>
        <h2>Crea un nuovo post</h2>

        <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="category_id" class="form-label">Categoria</label>
                <select class="form-select" id="category_id" name="category_id">
                    <option value="">Nessuna</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <h4>Tags</h4>
                @foreach ($tags as $tag)
                    <div class="form-check">
                        <input {{ in_array($tag->id, old('tags', []))? 'checked' : '' }} class="form-check-input" type="checkbox" name="tags[]" value="{{$tag->id}}" id="tag-{{$tag->id}}">
                        <label class="form-check-label" for="tag-{{$tag->id}}">
                            {{$tag->name}}
                        </label>
                    </div>
                @endforeach
            </div>
            
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
            </div>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" id="image" name="image">
            </div>

            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </section>
@endsection