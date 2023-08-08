@extends('backend.master')

@section('content')
<h3 class="text-center"> Update Product Image</h3>
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
      <form action="{{url('/product/updateImage')}}" method="post" enctype="multipart/form-data">
        @csrf
       
     
      <div class="form-group">
        <label for="">Previous Image</label>
        <img src="/upload/{{$product->image}}" class="form-control" style="height: 300px;width:300px;margin:auto" >  
          </div>

      <input type="hidden" name="id" value="{{$product->id}}">
      <div class="form-group">
        <label for="">Update product Image</label>
        <input type="file" name="image" id="" >
        <br>
        <br>
        <button type="submit" class="btn btn-sm btn-primary">Update</button>
      </div>

     
      </form>
    </div>
  </div>

@endsection