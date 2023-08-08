@extends('backend.master')

@section('content')
<h3 class="text-center">Update Brand</h3>
  <div class="container">
    <div class="col-md-12">
        @if (session()->has('success'))
        <div class="alert alert-success" id="success">{{session()->get('success')}}</div>
        @endif
          
       
      <form action="{{url('/brands/update/'.$Brand->id)}}" method="post" >
        @csrf
      <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control" value="{{$Brand->name}}" placeholder="Enter Brand Name">
        <button type="submit" class="btn btn-sm btn-dark mt-2">Update</button>
      </div>
      </form>
    </div>
  </div>

@endsection