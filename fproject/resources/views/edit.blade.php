<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
</head>
<body>
@extends ("layouts.app")
@section('title',"Update Post")
@section('content')
    <div class="container">
        <form action="/post/{{ $post['id'] }}" method="POST">
            @method('put')
            @csrf
          
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" value="{{ $post['title'] }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Body</label>
                <textarea id="description" name="body"  class="form-control" required>{{ $post['body'] }}</textarea>
            </div>
           
            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
@endsection
        @if($errors->any())
           <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                   <li>{{$error}}</li>
                @endforeach
            </ul>
            </div>
        @endif
    </div>
</body>
</html>
