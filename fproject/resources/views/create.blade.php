<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
</head>
<body>
    <div class="container">
@extends ("layouts.app")
@section('title',"Create Post")
@section('content')
        <form action="{{ url('/posts') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{old('title')}}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Body</label>
                <textarea id="description" name="body" class="form-control"  value="{{old('body')}}" required></textarea>
            </div>
           
           
            <button type="submit" class="btn btn-primary">Add Post</button>
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

</body>
</html>
