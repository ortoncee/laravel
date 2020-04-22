@extends('layouts.blog')

@section('wrapped')
    <div class="card card-default">
        <div class="card-header">{{ isset($post) ? 'Edit Post' : 'Create Post' }}</div>
        <div class="card-body">
            <form action="{{ isset($post) ? route('post.update', $post->id) : route('post.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($post))
                    @method('put')
                @endif
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" class="form-control" name="title" value="{{ isset($post) ? $post->title : ''}}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="5" rows="5" class="form-control">{{ isset($post) ? $post->description : ''}}</textarea>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content : ''}}">
                    <trix-editor input="content"></trix-editor>
                </div>
                <div class="form-group">
                    <label for="published_at">Published At</label>
                    <input type="text" id="published_at" class="form-control" name="published_at" value="{{ isset($post) ? $post->published_at : ''}}">
                </div>
                @if(isset($post))
                    <div class="form-group">
                        <img src="{{ asset('storage/'.$post->image) }}" alt="" style="width: 20%;">
                    </div>
                @endif
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" id="image" class="form-control" name="image">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-success">{{ isset($post) ? 'Update Post' : 'Create Post'}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts block')
    flatpickr('#published_at', {
        enableTime: true
    })
@endsection
