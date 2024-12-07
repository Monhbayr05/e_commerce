@extends('layouts.admin')
@section('content')
    <table id="example" class="table table-striped" style="width:100%">
        <a href="{{route('admin.categories.create')}}" class="btn btn-primary">
            Create
        </a>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </tr>


        </thead>
        <tbody>
        @foreach($categories as $item)

            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>
                    <img src="{{asset($item->image)}}" alt="Image" class="avatar avatar-sm me-3 border-radius-lg"
                         width="100px">
                </td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
                <td>
                    <a href="#" class="btn btn-warning">Edit</a>

                    <form action="#" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this category?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@push('script')
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });

    </script>

@endpush
