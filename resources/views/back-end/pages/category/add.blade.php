@extends('back-end.master')

@section('content')

<div class="container">
   @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

  @if(session()->has('success'))
    <div class="alert alert-success">{{ session()->get('success') }}</div>
  @endif
    <div class="com-md-12 mt-3">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
               <form action="{{ url('/category/store') }}" method="post" enctype="multipart/form-data" >
                @csrf 
                <div class="form-control">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="Enter category name" >
                </div>

                <div class="form-control">
                    <label for="">Image</label>
                    <input type="file" name="image" id="" class="form-control" >
                </div>
                
                <button type="submit" class="btn btn-sm btn-dark mt-3">Submit</button>

               </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>

@endsection