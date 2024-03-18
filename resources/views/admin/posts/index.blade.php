@extends('layouts.layout')
@section('title','Posts | Admin Panel')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card overflow-hidden">
                @include('admin.shared.left_sidebar')
            </div>
        </div>
        <div class="col-md-9">
            <h1>Posts</h1>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Content</th>
                        <th>Created_at</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td><a href="{{route('users.show',$post->user->id)}}">{{$post->user->name}}</a></td>
                            <td>{{$post->content}}</td>
                            <td>{{$post->created_at->toDateString()}}</td>
                            <td><a href="{{route('posts.show',$post)}}">View</a></td>
                            <td><a href="{{route('posts.edit',$post)}}">Edit</a></td>
                            <td>
                                <form method="post" action="{{route('posts.destroy',$post->id)}}">
                                    @csrf
                                    @method('delete')
                                    <button class="ms-1 btn btn-danger btn-sm">X</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                {{$posts->links()}}
            </div>
        </div>
    </div>
@endsection
