@extends('layouts.app')
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="d-flex my-5 justify-content-center">
        <div class="col-md-10">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($todos) > 0)
                    @foreach($todos as $todo)
                        <tr>
                            <th scope="row">{{ $todo->id }}</th>
                            <td>{{ $todo->name }}</td>
                            <td>{{ $todo->description }}</td>
                            <td class="d-flex justify-content-between text-center">
                                <a class="btn btn-danger" href="todo/{{ $todo->id }}/delete">delete
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                                <a class="btn btn-info mx-2" href="todo/{{ $todo->id }}/edit">edit
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                                <a class="btn btn-success" href="todo/{{ $todo->id }}/show">view
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                @if(!$todo->completed)
                                    <a class="btn btn-warning ml-2" href="{{ route('todo.completed', $todo->id) }}">completed
                                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <a href="{{ route('todo.create') }}" class="btn btn-outline-success float-right">Create</a>
        </div>
    </div>
@endsection
