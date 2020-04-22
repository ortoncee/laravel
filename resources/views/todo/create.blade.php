@extends('layouts.app')

@section('title', '| Create New Post')

@section('content')

    @if( $errors->any() )
        {{--@if( count($errors) > 0)--}}
        <div class="d-flex justify-content-center">
            <div class="col-md-8 my-5">
                <div class="card card-default">
                    <div class="card-header">
                        @foreach($errors->all() as $err)
                        <div class="alert alert-danger">
                            {{ $err }}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="d-flex justify-content-center">
        <div class="col-md-8 my-5">
            <div class="card card-default">
                <div class="card-header">Create Form</div>
                <div class="card-body">
                    <form action="{{ route('todo.store') }}" method="post">@csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Name" name="name">
                            {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                        </div>
                        <div class="form-group">
                            <label class="form-check-label" for="exampleCheck1">Description</label>
                            <textarea id="exampleCheck1" class="form-control" rows="05" cols="30" placeholder="Description" name="description"></textarea>
                            {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection()