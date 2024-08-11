@extends ("layouts.app")
@section('title',"View Post")
@section('content')
    <ul>
        <li><span class="fw-bold">ID : </span>{{$post['id']}}</li>
        <li><span class="fw-bold">Title : </span>{{$post['title']}}</li>
        <li><span class="fw-bold">Body : </span>{{$post['body']}}</li>
        <li><span class="fw-bold">Posted By : </span>{{ $post->user->name}}</li>
        <li><span class="fw-bold">created At : </span>{{$post['created_at']}}</li>

    </ul>
    @endsection
