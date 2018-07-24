@extends('layouts.app')

@section('content')
@include('admin.includes.errors')
<!-- /post/store -->
 <div class="panel panel-primary">
    <div class="panel-heading">Update : {{ $category->name }} </div>

    <div class="panel-body">
     <form action="{{route('category.update', ['id'=> $category->id])}}" method="post">
         {{ csrf_field() }}
         <div class="form-group">
        <label for="name">Category Name</label>
 <input class="form-control" type="text" name="name" value="{{ $category->name }}" >
         </div>
         <div class="form-group">
         <button type="submit" class="btn btn-success pull-right"> Update Category </button>
        </div>

     </form>
    </div>
</div>
@endsection