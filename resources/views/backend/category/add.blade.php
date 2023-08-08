@extends('backend.master')

@section('content')
<h3 class="text-center"> Add Category</h3>
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
      <form action="{{url('/category/store')}}" method="post" >
        @csrf
      <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Category Name">
        <button type="submit" class="btn btn-sm btn-dark mt-2">Submit</button>
      </div>
      </form>
    </div>
  </div>

@endsection