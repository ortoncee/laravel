@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-md-8 my-5">
            <div class="card card-default">
                <div class="card-header">Edit Form</div>
                <div class="card-body">
                    <form action="{{ route('todo.update', $todos->id) }}" method="post">@csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" id="" placeholder="Enter Your Name" name="name" value="{{ $todos->name }}">
                            {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                        </div>
                        <div class="form-group">
                            <label class="form-check-label" for="">Description</label>
                            <textarea id="" class="form-control" rows="05" cols="10" placeholder="Description" name="description">{{ $todos->description }}</textarea>
                            {{--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection