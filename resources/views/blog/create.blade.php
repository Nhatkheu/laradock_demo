@extends('master')
@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
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
    <!-- <div class="form-group">
        <label for="image">Image</label>
        <br>
        <img id="image" src="#" onerror="if (this.src != '{{url('img/default-image.jpg')}}') this.src = '{{url('img/default-image.jpg')}}';" style="max-width: 200px; max-height: 200px; margin-bottom: 15px;">
        <input type="file" name="imageTest" class="form-control-file" onchange="readURL(this);" required>
    </div> -->
    <label for="image">Image</label>
    <br>
    <img id="image" src="#" onerror="if (this.src != '{{url('img/default-image.jpg')}}') this.src = '{{url('img/default-image.jpg')}}';" style="max-width: 200px; max-height: 200px; margin-bottom: 15px;">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Upload</span>
        </div>
        <div class="custom-file">
            <input type="file" name="imageTest" onchange="readURL(this);" class="custom-file-input" id="inputGroupFile01" required>
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
    </div>
    <input type="submit" class="btn btn-primary" name="Submit">
    <a class="btn btn-info" href="{{ URL::previous() }}">Back</a>
</form>
@endsection
