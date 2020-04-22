@extends('layouts.blog')

@section('wrapped')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('category.create') }}" class="btn btn-outline-success">Add Category</a>
    </div>

    <div class="card card-default">
        <div class="card-header">Categories</div>
        @if($categories->count() > 0)
            <div class="card-body">
            <table class="table">
                <thead>
                <th>Name</th>
                <th></th>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            {{ $category->name }}
                        </td>
                        <td>
                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <a onclick="handleDelete({{ $category->id }})" class="btn btn-danger btn-sm ">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="" method="post" id="deleteCategoryForm">@csrf
                        @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center text-bold">
                                    Are you sure you want to delete {{ $category->name }} category ?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go back</button>
                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @else
            <strong class="text-center my-4">No category yet.</strong>
        @endif
    </div>
@endsection


@section('scripts')
    <script>
        function  handleDelete(id) {
//            console.log('clicked Delete button ' + id);
            var form = document.getElementById('deleteCategoryForm');
            form.action = '/category/' + id;
//            console.log( form );
            $('#deleteModal').modal('show');
        }
    </script>
@endsection