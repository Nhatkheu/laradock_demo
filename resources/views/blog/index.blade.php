@extends('master')
@section('content')
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<div class="col-lg-12 margin-tb">
    <div class="pull-left" style="float: left;">
        <h2>CRUD</h2>
    </div>
    <div class="pull-right" style="float: right;">
        <a class="btn btn-info" href="{{action('BlogController@create')}}">Create new</a>
    </div>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Image</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($blogs as $blog)
        <tr>
            <td>{{$blog['id']}}</td>
            <td>{{$blog['title']}}</td>
            <td>{{$blog['content']}}</td>
            <td>
                <img src="upload/{{$blog->image}}" style="max-width: 300px; max-height: 300px;" alt="">
            </td>
            <td><a href="{{action('BlogController@edit', $blog['id'])}}" class="btn btn-info">Edit</a></td>
            <td>
                <form action="{{action('BlogController@destroy', $blog['id'])}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
