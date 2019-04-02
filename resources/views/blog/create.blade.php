@extends('master')
@section('content')
@if ($errors->any())
<ul class="error-form">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif
<form method="post" action="{{url('blog')}}" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Title" name="title" required>
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="content" rows="3" placeholder="content" name="content" required></textarea>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <br>
        <img id="image" src="#" onerror="if (this.src != '{{url('img/default-image.jpg')}}') this.src = '{{url('img/default-image.jpg')}}';" style="max-width: 200px; max-height: 200px; margin-bottom: 15px;">
        <input type="file" name="imageTest" class="form-control-file" onchange="readURL(this);" required>
    </div>
    <input type="submit" class="btn btn-primary" name="Submit">
</form>
@endsection
