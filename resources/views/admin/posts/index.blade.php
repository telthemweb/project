@extends('layouts.app')

@section('content')

<!-- /post/store -->
 <div class="panel panel-primary">
     <div class="panel-heading">Latest Post</div>
</div>

     <table class="table table-hover table-inverse table-hover">
         <thead>
             <tr>
                 <th>Image</th>

                 <th>Title</th>

                <th>Description</th>

                 <th>Edit</th>
             
                 <th>Trash</th>
             </tr>
         </thead>
         <tbody>
            @if($posts->count()>0)
            @foreach($posts as $post)
             <tr>
                 <td><img src="{{ $post->featured }}" alt="" class="img-responsive" width="90" height="50" ></td>
                 <td>{{ $post->title }}</td>
                 <td>{{ $post->content }}</td>
                 <td><a class="btn btn-success btn-sm" href="{{route('post.edit',['id'=>$post->id])}}"><i class="fa fa-pencil"></i></a></td>
                 <td><a class="btn btn-danger btn-sm" href="{{route('post.delete', ['id'=>$post->id])}}"><i class="fa fa-trash"></i></a></td>
             </tr>
             @endforeach 
             @else
             <tr>
                    <th colspan="5" class ="text-center" style="color:red; font-weight: bold;" >No Latest Posts :)</th>
                </tr>
            @endif
         </tbody>
     </table>

@endsection

