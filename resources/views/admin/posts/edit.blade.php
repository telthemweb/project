@extends('layouts.app')

@section('content')
@include('admin.includes.errors')
<!-- /post/store -->
 <div class="panel panel-primary">
    <div class="panel-heading">Create new Post</div>

    <div class="panel-body">
     <form action="{{route('post.update', ['id'=>$post->id])}}" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
         <div class="form-group">
            <label for="title">Title</label>
                <input class="form-control" type="text" name="title" value="{{$post->title}}" >
         </div>

          <div class="form-group">
            <label for="featured">Featured Image</label>
                <input class="form-control" type="file" name="featured" value="{{$post->featured}}" >
         </div>

          <div class="form-group">
            <label for="description">Description</label>
                <textarea class="form-control" cols="5" rows="5" name="content" >{{$post->content}}</textarea>
         </div>

         <div class="form-group">
            <label for="category">Select a Category</label>
            <select name="category_id" id="category" class="form-control">
                @foreach($categories as $cat)
                <option value="{{ $cat->id }}"



                         @if($post->category->id ==  $cat->id )
                            selected
                         @endif
                        

                    >{{ $cat->name }}</option>
                @endforeach
            </select>
               
         </div>

         <div class="form-group">
            <label for="tags">Select tags</label>
               @foreach($tags as $tg)
                <div class="checkbox">
                    <label>
                    <input type="checkbox" name="tags[]" value="{{$tg->id}}"

                         @foreach($post->tags as $type)

                         @if($tg->id == $type->id )
                            checked
                         @endif
                          @endforeach
                         >{{$tg->tag}}
                    </label>
                </div>
               @endforeach
         </div>
        <div class="form-group">
         <button type="submit" class="btn btn-success pull-right"> Update Post </button>
        </div>

     </form>
    </div>
</div>
@endsection