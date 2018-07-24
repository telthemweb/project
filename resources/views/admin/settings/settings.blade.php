@extends('layouts.app')

@section('content')
@include('admin.includes.errors')
<!-- /post/store -->
 <div class="panel panel-primary">
    <div class="panel-heading">Edit Blog Settings</div>

    <div class="panel-body">
     <form action="{{route('settings.update')}}" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
         <div class="form-group">
         	<label for="site_name">Site Name</label>
         		<input class="form-control" type="text" name="site_name" value="{{ $settings->site_name }}" >
         </div>

         <div class="form-group">
            <label for="contact_number">Contact Number</label>
                <input class="form-control" type="text" name="contact_number" value="{{ $settings->contact_number }}" >
         </div>

          <div class="form-group">
         	<label for="Email">Email Address</label>
         		<input class="form-control" type="email" name="contact_email" value="{{ $settings->contact_email }}" >
         </div>

          <div class="form-group">
            <label for="address">Physical Address</label>
                <input class="form-control" type="text" name="address" value="{{ $settings->address }}" >
         </div>

  
		<div class="form-group">
		 <button type="submit" class="btn btn-success pull-right"> Update Settings </button>
		</div>

     </form>
    </div>
</div>
@endsection