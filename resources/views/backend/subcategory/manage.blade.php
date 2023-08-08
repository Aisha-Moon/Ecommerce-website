@extends('backend.master')

@section('content')

  <div class="container">
    <div class="col-md-12">
       @if (session()->has('success'))
        <div class="alert alert-success" id="success">{{session()->get('success')}}</div>
        @endif
      <table class="table table-bordered">
          <tr>
            <td>Sl</td>
            <td>Category Name</td>
            <td>SubCategory Name</td>
            <td>Action</td>
          </tr>
          
          @foreach ($subcategories as $subcategory )
            <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{$subcategory->category?->name}} </td>
              <td>{{$subcategory->name}}</td>
              <td>
              <a href="{{url('/subcategory/edit/'.$subcategory->id)}}" class="btn btn-sm btn-info">Edit</a>
              <a href="{{url('/subcategory/delete/'.$subcategory->id)}}" class="btn btn-sm btn-danger">Delete</a>
             </td>
          </tr>
          @endforeach
          
      </table>
    </div>
  </div>

@endsection