@extends('layouts.app')

@section('content')
@include('admin.includes.errors')
<!-- /post/store -->
 <div class="panel panel-primary">
    <div class="panel-heading">Edit Profile
        <span class=" pull-right"><i class="fa fa-pencil"></i></span>
    </div>

    <div class="panel-body">
     <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
         <div class="form-group">
            <label for="name">Username <i class="fa fa-user"></i></label>
                <input class="form-control" type="text" name="name"  value="{{ $user->name }}" >
         </div>

          <div class="form-group">
            <label for="Email">Email Address <i class="fa fa-envelope"></i></label>
                <input class="form-control" type="email" name="email" placeholder="Email Address...." value="{{ $user->email }}">
         </div>
      <div class="form-group">
            <label for="password">New Password <i class="fa fa-key"></i></label>
                <input class="form-control" type="password" name="password" >
         </div>
         
         <div class="form-group">
            <label for="Avatar">Profile Picture <i class="fa fa-user"></i></label>
                <input class="form-control" type="file" name="avatar">
         </div>

         <div class="form-group">
            <label for="description">Bio <i class="fa fa-globe"></i></label>
                <textarea class="form-control" cols="5" rows="5" name="bio">{{ $user->profile->about }}</textarea>
         </div>

          <div class="form-group">
            <label for="facebook"><i class="fa fa-facebook" ></i> Facebook Url</label>
                <input class="form-control" type="text" name="facebook" value="{{ $user->profile->facebook }}" >
         </div>

          <div class="form-group">
            <label for="youtube"><i class="fa fa-youtube"></i> Youtube Url</label>
                <input class="form-control" type="text" name="youtube"  value="{{ $user->profile->youtube }}">
         </div>

          <div class="form-group">
            <label for="whatsapp"><i class="fa fa-whatsapp"></i> Whatsapp Url</label>
                <input class="form-control" type="text" name="whatsapp" value="{{ $user->profile->whatsapp }}">
         </div>      
        
        <div class="form-group">
         <button type="submit" class="btn btn-success pull-right">Update Profile </button>
        </div>

     </form>
    </div>
</div>
@endsection