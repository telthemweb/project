@extends('layouts.app')

@section('content')

<!-- /post/store -->
 <div class="panel panel-primary">
     <div class="panel-heading">List of  Tags</div>
</div>

     <table class="table table-bordered table-inverse table-hover">
         <thead>
             <tr>
                 <th>Tag Name</th>
             
                 <th>Editing</th>
             
                 <th>deleting</th>
             </tr>
         </thead>
         <tbody>
            @if($tags->count()>0)
            @foreach($tags as $t)
             <tr>
                 <td>{{ $t->tag }}</td>
                 <td><a class="btn btn-success btn-sm" href="{{route('tag.edit',['id'=>$t->id])}}"><i class="fa fa-pencil"></i></a></td>
                 <td><a class="btn btn-danger btn-sm" href="{{route('tag.delete', ['id'=>$t->id])}}"><i class="fa fa-trash"></i></a></td>
             </tr>
             @endforeach 
              @else
             <tr>
                    <th colspan="5" class ="text-center" style="color:red; font-weight: bold;" >No Tag :)</th>
                </tr>
         </tbody>
     </table>
 @endif
@endsection