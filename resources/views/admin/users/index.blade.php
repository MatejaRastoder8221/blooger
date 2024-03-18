@extends('layouts.layout')
@section('title','Users | Admin Panel')
@section('content')
    <div class="row">
        <div class="col-3">
            <div class="card overflow-hidden">
                @include('admin.shared.left_sidebar')
            </div>
        </div>
        <div class="col-9">
            <h1>Users</h1>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Joined at</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->toDateString()}}</td>
                            <td><a href="{{route('users.show',$user)}}" >View</a></td>
                            <td><a href="{{route('users.edit',$user)}}" >Edit</a></td>
                            <td>
                                <form method="post" action="{{route('users.destroy',$user)}}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{$users->links()}}
            </div>
        </div>
    </div>
@endsection
