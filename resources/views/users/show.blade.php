@extends('layouts.layout')
@section('title','User profile')
@section('content')
    <div class="row">
        <div class="col-3">
            <div class="card overflow-hidden">
                @include('shared.left_sidebar')
            </div>
        </div>
        <div class="col-6">
            @include('shared.success_message')
            <hr>
            <div class="mt-3">
                @include('users.shared.user_card')
            </div>
            <hr>
            @if(count($posts) >0 )
                @foreach($posts as $post)
                    <div class="mt-3">
                        @include('shared.post_card')
                    </div>
                @endforeach
            @else()
                <p class="alert alert-danger mt-3">No Results Found.</p>
            @endif
            {{$posts->withQueryString()->links()}}
        </div>
        <div class="col-3">
            @include('shared.search_bar')
            @include('shared.follow_box')
        </div>
    </div>
@endsection


