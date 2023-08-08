@extends('backend.master')

@section('content')

  <div class="container">
    <div class="col-md-12">
       @if (session()->has('success'))
        <div id="success" class="alert alert-success">{{session()->get('success')}}</div>
        @endif
      <table class="table table-bordered">
          <tr>
            <td>Name</td>
            <td>Action</td>
          </tr>
          @foreach ($brands as $brand )
            <tr>
            <td>{{$brand->name}}</td>
            <td>
              <a href="{{url('/brands/edit/'.$brand->id)}}" class="btn btn-sm btn-info">Edit</a>
              <a href="{{url('/brands/delete/'.$brand->id)}}" class="btn btn-sm btn-danger">Delete</a>
            </td>
          </tr>
          @endforeach
          
      </table>
    </div>
  </div>

@endsection