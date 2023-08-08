@extends('backend.master')

@section('content')

  <div class="container">
    <div class="col-md-12">
       @if (session()->has('success'))
        <div id="success" class="alert alert-success">{{session()->get('success')}}</div>
        @endif
      <table class="table table-bordered">
          <tr>
            <td>Sl</td>
            <td>Product Name</td>
            <td>Price</td>
            <td>Discounted_price</td>
            <td>Quantity</td>         
            <td>Description</td>
            <td>Category</td>
            <td>Brand</td>
            <td>Image</td>
            <td>Action</td>
          </tr>
          
          @foreach ($products as $product )
            <tr>
            <td>{{$loop->index+1}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->discounted_price}}</td>
            <td>{{$product->quantity}}</td>
            <td>{{$product->short_description}}</td>
            <td>{{$product->category?->name}}</td>
            <td>{{$product->brand?->name}}</td>
            <td>
              <img src="/upload/{{$product->image}}" class="form-control" style="height: 100px">
              <br>
             <a href="{{url('/product/editImage/'.$product->id)}}" class="btn btn-sm btn-info">Update image</a>

            </td>
            <td>
              <a href="{{url('/product/edit/'.$product->id)}}" class="btn btn-sm btn-info">Edit</a>
              <a href="{{url('/product/delete/'.$product->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure Delete this data?')">Delete</a>
            </td>
          </tr>
          @endforeach
          
      </table>
    </div>
  </div>

@endsection