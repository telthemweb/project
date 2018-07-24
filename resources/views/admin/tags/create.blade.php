@extends('layouts.app')

@section('content')
@include('admin.includes.errors')
<!-- /post/store -->
 <div class="panel panel-primary">
    <div class="panel-heading">Create new Tag</div>

    <div class="panel-body">
     <form action="{{route('tag.store')}}" method="post">
         {{ csrf_field() }}
         <div class="form-group">
         	<label for="name">tag Name</label>
         		<input class="form-control" type="text" name="tag" placeholder="Tag Name...." >
         </div>
         <div class="form-group">
         <button type="submit" class="btn btn-success pull-right"> Create Tag </button>
        </div>

     </form>
    </div>
</div>
@endsection