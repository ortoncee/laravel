@extends('layouts.blog')
@section('wrapped')
    <div class="card card-default">
        <div class="card-header">
            {{ isset($category) ? 'Edit Categories' : 'Create Categories' }}
        </div>
        <div class="card card-body">
            @if( $errors->any() )
                <div class="alert alert-danger">
                    <ul class="list-group">
                        @foreach($errors->all() as $err)
                            <li class="list-group-item text-danger">
                                {{ $err }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}"
                  method="post">@csrf
                @if(isset($category))
                    @method('put')
                @endif
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" name="name"
                    value="{{ isset($category) ? $category->name : '' }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success float-right">
                        {{ isset($category) ? 'Update Category' : 'Add Category' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
