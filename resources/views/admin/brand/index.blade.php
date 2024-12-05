@extends('layouts.admin')
@section('content')
    <table id="example" class="table table-striped" style="width:100%">
        <a href="{{route('admin.brands.create')}}" class="btn btn-primary">
            Create
        </a>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </tr>


        </thead>
        <tbody>
        @foreach($brands as $item)

            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>
                    <img src="{{asset($item->image)}}" alt="Image" class="avatar avatar-sm me-3 border-radius-lg"
                         width="100px">
                </td>
                <td class="align-middle text-sm">
                    @if($item->status==0)
                        <span class="badge badge-sm bg-gradient-success">Public</span>
                    @elseif($item->status==1)
                        <span class="badge badge-sm bg-gradient-primary">Private</span>
                    @else
                        <span class="badge badge-sm bg-gradient-warning">Other</span>
                    @endif
                </td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
                <td></td>
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
