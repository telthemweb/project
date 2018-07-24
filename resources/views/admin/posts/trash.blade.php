@extends('layouts.app')

@section('content')

<!-- /post/store -->
 <div class="panel panel-danger">
     <div class="panel-heading">Trashed Post <span class="pull-right badge"><i class="fa fa-trash"></i></span></div>
</div>

     <table class="table table-hover table-inverse table-hover">
         <thead>
             <tr>
                 <th>Image</th>

                 <th>Title</th>

                <th>Description</th>

                 <th>Editing</th>
             
                 <th>Restore</th>

                 <th>Destroy</th>
             </tr>
         </thead>
         <tbody>
           @if($posts->count()>0)
             @foreach($posts as $post)
             <tr>
                 <td><img src="{{ $post->featured }}" alt="" class="img-responsive" width="90" height="50" ></td>
                 <td>{{ $post->title }}</td>
                 <td>{{ $post->content }}</td>
                 <td><a class="btn btn-secondary btn-sm" href="{{route('post.edit',['id'=>$post->id])}}"><i class="fa fa-pencil"></i></a></td>
                 <td><a class="btn btn-success " href="{{route('post.restore', ['id'=>$post->id])}}">Restore <i class="fa fa-send"></i></a></td>
                 <td><a class="btn btn-danger " href="{{route('posts.wipe', ['id'=>$post->id])}}">Wipe <i class="fa fa-trash"></i></a></td>
             </tr>
             @endforeach 

             @else
                <tr>
                    <th colspan="5" class ="text-center" style="color:red; font-weight: bold;" >No trashed Posts :)</th>
                </tr>
           @endif
         </tbody>
     </table>

@endsection

