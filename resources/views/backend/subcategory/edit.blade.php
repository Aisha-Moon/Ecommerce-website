@extends('backend.master')

@section('content')
<h3 class="text-center">Update Category</h3>
  <div class="container">
    <div class="col-md-12">
        @if (session()->has('success'))
        <div class="alert alert-success" id="success">{{session()->get('success')}}</div>
        @endif
      <form action="{{url('/subcategory/update/'.$subcategory->id)}}" method="post" >
        @csrf
        <div class="form-group">
        <label for="">Category Name</label>
        <select name="category_id" class="form-control">
         <option selected disabled>Select a category</option>
          @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
       
      </div>
      <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control" value="{{$subcategory->name}}" >
        <button type="submit" class="btn btn-sm btn-dark mt-2">Update</button>
      </div>
      </form>
    </div>
  </div>

@endsection