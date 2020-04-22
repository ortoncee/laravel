@extends('layouts.blog')

@section('wrapped')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('post.create') }}" class="btn btn-outline-success">Create Post</a>
    </div>
        <div class="card card-default">
            <div class="card-header">Post</div>
            @if($posts->count() > 0)
                <div class="card-body">
                <table class="table">
                 <thead>
                    <th>Image</th>
                    <th>Title</th>
                    <th></th>
                    <th></th>
                 </thead>
                @if(count($posts) > 0)
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/'.$post->image) }}" width="80px" height="50px" alt="">
                                </td>
                                <td>{{ $post->title }}</td>
                                @if($post->trashed())
                                    <td>
                                        <form action="{{ route('restore.post', $post->id) }}" method="post">@csrf
                                            @method('put')
                                            <button type="submit" class="btn btn-info btn-sm">Restore</button>
                                        </form>
                                    </td>
                                @else
                                <td>
                                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-info btn-sm">Edit</a>
                                </td>
                                @endif
                                <td>
                                    <form action="{{ route('post.destroy', $post->id) }}" method="post">@csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            {{ $post->trashed() ? 'Delete' : 'Trashed' }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @endif
             </table>
         </div>
            @else
                <strong class="text-center my-4">No post yet.</strong>
            @endif
        </div>
@endsection
