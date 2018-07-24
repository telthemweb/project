@extends('layouts.app')

@section('content')
@include('admin.includes.errors')
<!-- /post/store -->
 <div class="panel panel-primary">
    <div class="panel-heading">Update : {{ $tag->name }} </div>

    <div class="panel-body">
     <form action="{{route('tag.update', ['id'=> $tag->id])}}" method="post">
         {{ csrf_field() }}
         <div class="form-group">
        <label for="name">Tag Name</label>
 <input class="form-control" type="text" name="tag" value="{{ $tag->tag }}" >
         </div>
         <div class="form-group">
         <button type="submit" class="btn btn-success pull-right"> Update </button>
        </div>

     </form>
    </div>
</div>
@endsection