@extends('layouts.layout')
@section('title', 'Comments | Admin Panel')
@section('content')
    <div class="row">
        <div class="col-12 col-md-3">
            <div class="card overflow-hidden">
                @include('admin.shared.left_sidebar')
            </div>
        </div>
        <div class="col-12 col-md-9">
            <h1>Comments</h1>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Post</th>
                        <th>Content</th>
                        <th>Created_at</th>
                        <th>View</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td><a href="{{ route('users.show', $comment->user->id) }}">{{ $comment->user->name }}</a></td>
                            <td><a href="{{ route('posts.show', $comment->post_id) }}">{{ $comment->post_id }}</a></td>
                            <td>{{ $comment->content }}</td>
                            <td>{{ $comment->created_at->toDateString() }}</td>
                            <td><a href="{{ route('posts.show', $comment->post) }}">View</a></td>
                            <td>
                                <form method="post" action="{{ route('admin.comments.destroy', $comment) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="ms-1 btn btn-danger btn-sm">X</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                {{ $comments->links() }}
            </div>
        </div>
    </div>
@endsection
