@extends('back-end.master')

@section('content')

<div class="container">
    <div class="col-md-12 mt-3">
        <table class="table table-bordered ">
            <tr>
                <th>SL</th>
                <th>Image</th>
                <th>Name</th>
                <th>price</th>
                <th>Action</th>
            </tr>

            @foreach ($products as $product)
            <tr>
                <td>{{ $loop->index+1 }}</td>
                
                <td>
                    <img src="{{ asset('images/'.$product->image) }}" height="50" width="50" alt="">
                </td>
                <td>
                    <strong>Product Name :</strong>{{ $product->name }} <br>
                    <strong>Category Name :</strong>{{ $product->category->name }} <br>
                <td>

                <td>
                    <strong>Product price :</strong>{{ $product->price }} <br>
                    <strong>Product discount Price :</strong>{{ $product->discount_price }} <br>
                    
                <td>
                <td>
                    <a href="{{ url('/product/edit/' .$product->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{ url('/product/delete/' .$product->id) }}" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach

          
        </table>
    </div>
</div>

@endsection