@extends('back-end.master')

@section('content')

<div class="container">
    <div class="col-md-12 mt-3">
        <table class="table table-bordered ">
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Image</th>
                <th>Action</th>
            </tr>

            @foreach ($categories as $category)
            <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <img src="{{ asset('images/'.$category->image) }}" height="50" width="50" alt="">
                </td>
                <td>
                    <a href="{{ url('/category/edit/' .$category->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{ url('/category/delete/' .$category->id) }}" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach

          
        </table>
    </div>
</div>

@endsection