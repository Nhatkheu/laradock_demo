@extends('master')
@section('content')
<form method="post" action="{{action('BlogController@update', $id)}}" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group">
        <input name="_method" type="hidden" value="PATCH">
        <label for="title">Title</label>
        <input type="text" class="form-control form-control-lg" name="title" value="{{$blog->title}}" placeholder="Title">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" name="content" rows="3" placeholder="content">{{$blog->content}}</textarea>
    </div>
    <div class="form-group">
      <label for="image">Image</label>
      <br>
      <img id="image" src="{{$blog->image}}" onerror="if (this.src != '{{url('img/default-image.jpg')}}') this.src = '{{url('img/default-image.jpg')}}';"  style="max-width: 200px; max-height: 200px; margin-bottom: 15px;">
      <input type="file" name="imageTest" class="form-control-file" onchange="readURL(this);" value="{{$blog->image}}" required>
    </div>
    <input type="submit" class="btn btn-primary" name="Update">
</form>
@endsection
