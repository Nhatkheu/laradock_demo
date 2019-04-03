@extends('master')
@section('content')
<form method="post" action="{{action('BlogController@update', $id)}}" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group">
        <input name="_method" type="hidden" value="PATCH">
        <label for="title">Title</label>
        <input type="text" class="form-control form-control-lg" id="title" name="title" value="{{$blog->title}}" placeholder="Title">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="content" name="content" rows="3" placeholder="content">{{$blog->content}}</textarea>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <br>
        <img id="image" src="{{asset(($blog->image!='') ? 'upload/'.$blog->image:'img/default-image.jpg')}}" style="max-width: 200px; max-height: 200px; margin-bottom: 15px;">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="imageTest" onchange="readURL(this);" required>
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
    </div>
    <input type="submit" class="btn btn-primary" value="Update">
    <a class="btn btn-info" href="{{ URL::previous() }}">Back</a>
</form>
@endsection
