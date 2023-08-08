@extends('backend.master')

@section('content')
<h3 class="text-center"> Add Product</h3>
  <div class="container">
    <div class="col-md-12">
        @if (session()->has('success'))
        <div class="alert alert-success" id="success">{{session()->get('success')}}</div>
        @endif
                    {{-- error message --}}
          @if ($errors->any())
    <div class="alert alert-danger" id="error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      <form action="{{url('/product/create')}}" method="post" enctype="multipart/form-data">
        @csrf
       
      <div class="form-group">
        <label for="">Category name</label>
        <select name="category_id" class="form-control">
          <option selected disabled>Select a category</option>
          @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
          
        </select>
       
      </div>
      <div class="form-group">
        <label for="">SubCategory name</label>
        <select name="subcategory_id" class="form-control">
          <option selected disabled>Select a Subcategory</option>
          @foreach ($subcategories as $subcategory)
            <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
          @endforeach
          
        </select>
       
      </div>
      <div class="form-group">
        <label for="">Brand name</label>
        <select name="brand_id" class="form-control">
          <option selected disabled>Select a Brand</option>
          @foreach ($brands as $brand)
            <option value="{{$brand->id}}">{{$brand->name}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="">Product Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Product Name">
      </div>
      <div class="form-group">
        <label for="">Product Price</label>
        <input type="text" name="price" class="form-control" placeholder="Enter Product price">
      </div>
      <div class="form-group">
        <label for="">Discounted Price</label>
        <input type="text" name="discounted_price" class="form-control" placeholder="Enter discounted_price">
      </div>
      <div class="form-group">
        <label for="">Product Quantity</label>
        <input type="text" name="quantity" class="form-control" placeholder="Enter Product Quantity">
      </div>
      <div class="form-group">
        <label for="">Short Description</label>
        <textarea name="short_desc" id="short_desc" class="form-control" rows="10" placeholder="Enter short Description"></textarea>
      </div>
      <div class="form-group">
        <label for="">Long Description</label>
        <textarea name="long_desc" id="summernote" class="form-control" rows="10" placeholder="Enter Long Description"></textarea>
      </div>
      <div class="form-group">
        <label for="">Product Image</label>
        <input type="file" name="image" class="form-control" placeholder="Enter Product Image">
      </div>
                <button type="submit" class="btn btn-sm btn-dark mt-2">Add </button>
      </form>
    </div>
  </div>

@endsection