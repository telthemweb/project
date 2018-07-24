@extends('layouts.app')

@section('content')
@include('admin.includes.errors')
<!-- /post/store -->
 <div class="panel panel-primary">
    <div class="panel-heading">Create new User</div>

    <div class="panel-body">
     <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
         <div class="form-group">
         	<label for="name">User</label>
         		<input class="form-control" type="text" name="name" placeholder="name...." >
         </div>

          <div class="form-group">
         	<label for="Email">Email Address</label>
         		<input class="form-control" type="email" name="email" placeholder="Email Address...." >
         </div>

         
               
      
        
          
		<div class="form-group">
		 <button type="submit" class="btn btn-success pull-right"> Create Account </button>
		</div>

     </form>
    </div>
</div>
@endsection