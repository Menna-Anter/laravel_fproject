<!DOCTYPE html>
<html>
<head>
    <title>Posts List</title>
</head>
<body>
@extends ("layouts.app")
@section('title',"List All Posts")
@section('content')
<a href="{{ url('/posts/create') }}" class="btn btn btn-secondary">Add Post</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Body</th>
                <th>Posted By</th>
                <th>Create At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post-> id}}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body}}</td>
                <td>{{ $post->user->name}}</td>
                <td>{{ $post->created_at}}</td>
                <td>
                <a href="{{ url('/post/' . $post['id'] . '/edit') }}" class="btn btn-primary">Edit</a>
                    <form action="/post/{{ $post['id'] }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="/post/{{ $post['id'] }}" class="btn btn-success">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
   
    </table>
@endsection
@section('pagination')
<div class="d-flex justify-content-center">
    {{ $posts->links('pagination::bootstrap-5') }}
</div>
@endsection
</body>
</html>
