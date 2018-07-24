@extends('layouts.app')

@section('content')
@include('admin.includes.errors')
<!-- /post/store -->
 <div class="panel panel-primary">
    <div class="panel-heading">Create new Category</div>

    <div class="panel-body">
     <form action="{{route('categories.store')}}" method="post">
         {{ csrf_field() }}
         <div class="form-group">
         	<label for="name">Category Name</label>
         		<input class="form-control" type="text" name="name" placeholder="Category Name...." >
         </div>
         <div class="form-group">
         <button type="submit" class="btn btn-success pull-right"> Create Category </button>
        </div>

     </form>
    </div>
</div>
@endsection