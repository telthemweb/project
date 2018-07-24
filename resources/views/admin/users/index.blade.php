@extends('layouts.app')

@section('content')

<!-- /post/store -->
 <div class="panel panel-success">
     <div class="panel-heading">Users
        <span class=" pull-right"><i class="fa fa-user"></i></span></a>
     </div>
</div>

     <table class="table table-hover table-inverse table-hover">
         <thead>
             <tr>
                 <th>Image</th>

                 <th>Name</th>

                <th>Permission</th>

             
                 <th>Trash</th>
             </tr>
         </thead>
         <tbody>
            @if($users->count()>0)
            @foreach($users as $user)
             <tr>
                 <td><img src="{{ asset($user->profile->avatar)}}" alt="" class="img-responsive" width="50" height="50" style="border-radius: 50%;"></td>
                 <td>{{ $user->name }}</td>
                 <td>
                 @if($user->admin)
                  <a class="btn btn-danger btn-sm" href="{{route('user.not_admin',['id'=>$user->id])}}">Remove Permissions <i class="fa fa-user"></i></a>
                 @else
                <a class="btn btn-success btn-sm" href="{{route('user.admin',['id'=>$user->id])}}">Make Administrator <i class="fa fa-user"></i></a>
                 @endif
                 </td>
             
                 <td>
                   @if(Auth::id() !== $user->id)
                     <a class="btn btn-danger btn-sm" href="{{route('user.delete',['id'=>$user->id])}}"><i class="fa fa-trash"></i></a>
                   @endif
                </td>
             </tr>
             @endforeach 
             @else
             <tr>
                    <th colspan="5" class ="text-center" style="color:red; font-weight: bold;" >No Users available :)</th>
                </tr>
            @endif
         </tbody>
     </table>

@endsection

