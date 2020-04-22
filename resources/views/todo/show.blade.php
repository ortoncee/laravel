@extends('layouts.app')

@section('content')
    <div class="d-flex my-5 justify-content-center">
        <div class="col-md-10">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{ $todo->id }}</th>
                        <td>{{ $todo->name }}</td>
                        <td>{{ $todo->description }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ route('todo.index') }}" class="btn btn-primary btn-sm">Go back</a>
        </div>
    </div>
@endsection