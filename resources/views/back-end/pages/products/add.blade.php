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
               <form action="{{ url('/product/store') }}" method="post" enctype="multipart/form-data" >
                @csrf 
                <div class="form-control">
                    <label for="">Category name</label>
                    <select class="form-control" name="category_id">
                    <option selected disabled>Select a category</option>
                    @foreach($categories as $category)

                    <option value="{{ $category->id }}" >{{$category->name}}</option>

                    @endforeach
                    </select>
                </div>

                <div class="form-control">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="Enter category name" >
                </div>

                <div class="form-control">
                    <label for="">Price</label>
                    <input type="text" name="price" id="" class="form-control" placeholder="Enter product price" >
                </div>

                <div class="form-control">
                    <label for="">Discount Price</label>
                    <input type="text" name="discount_price" id="" class="form-control" placeholder="Enter product discount price" >
                </div>

                <div class="form-control">
                    <label for="">Short description</label>
                    <textarea class="form-control" name="short_description" id="" cols="30" rows="5" placeholder="Short Description"></textarea>
                </div>

                <div class="form-control">
                    <label for="">Long description</label>
                    <textarea class="ckeditor form-control" name="long_description" id=""  placeholder="Short Description"></textarea>
                </div>

                <div class="form-control">
                    <label for="">Product type</label>
                    <select class="form-control" name="type">
                    <option selected disabled>Select a category</option>
                    <option value="hot">Hot</option>
                    <option value="new">New</option>
                    <option value="cool">Cool</option>
                
                    </select>
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

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>

@endsection