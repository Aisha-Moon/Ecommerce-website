@extends('backend.master')

@section('content')
<h3 class="text-center">Update Product</h3>
  <div class="container">
    <div class="col-md-12">
        @if (session()->has('success'))
        <div class="alert alert-success" id="success">{{session()->get('success')}}</div>
        @endif
      <form action="{{url('/product/update/'.$product->id)}}" method="post" enctype="multipart/form-data">
        @csrf
           <div class="form-group">
        <label for="">Category Name</label>
        <select name="category_id" class="form-control">
         <option selected disabled>Select a Category</option>
          @foreach ($categories as $category)
            <option value="{{$category->id}}"{{$product->category_id==$category->id ? 'selected' : '' }}>{{$category->name}}</option>
          @endforeach
        </select>
       
      </div>
      <div class="form-group">
        <label for="">SubCategory Name</label>
        <select name="subcategory_id" class="form-control">
         <option selected disabled>Select a SubCategory</option>
          @foreach ($subcategories as $subcategory)
            <option value="{{$subcategory->id}}"{{$product->sub_category_id==$subcategory->id ? 'selected' : '' }}>{{$subcategory->name}}</option>
            
          @endforeach
        </select>
       
      </div>
      <div class="form-group">
        <label for="">Brand Name</label>
        <select name="brand_id" class="form-control">
         <option selected disabled>Select a Brand</option>
          @foreach ($brands as $brand)
            <option value="{{$subcategory->id}}"{{$product->brand_id==$brand->id ? 'selected' : '' }}>{{$brand->name}}</option>
            
          @endforeach
        </select>
       
      </div>
        <div class="form-group">
        <label for="">Product Name</label>
        <input type="text" name="name" class="form-control" value="{{$product->name}}">
      
       
      </div>
        <div class="form-group">
        <label for="">Product price</label>
        <input type="text" name="price" class="form-control" value="{{$product->price}}">
       
       
      </div>
        <div class="form-group">
        <label for="">Discounted price</label>
        <input type="text" name="discounted_price" class="form-control" value="{{$product->discounted_price}}">
        
       
      </div>
        <div class="form-group">
        <label for="">Quantity</label>
        <input type="text" name="quantity" class="form-control" value="{{$product->quantity}}">
        
       
      </div>
        <div class="form-group">
        <label for="">Short Description</label>
        <input type="text" name="short_desc" class="form-control" value="{{$product->short_description}}">
       
      </div>
        <div class="form-group">
        <label for="">Long Description</label>
        <input type="text" name="long_desc" class="form-control" value="{{$product->long_description}}">
       
      </div>
   
        <div class="form-group">
        <label for="">Current product Image</label>
        <img src="{{asset('/upload/'.$product->image)}}" >
       
      </div>
      <div class="form-group">
        <label for="">Change Product Image</label>
        <input type="file" name="image" class="form-control" placeholder="Enter Product Image">
      </div>
      
        <button type="submit" class="btn btn-sm btn-dark mt-2">Update</button>
     
      </form>
    </div>
  </div>

@endsection