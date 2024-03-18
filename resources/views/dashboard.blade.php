@extends('layouts.layout')
@section('title','Dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-5">
            <div class="card overflow-hidden">
                @include('shared.left_sidebar')
            </div>
        </div>
        <div class="col-lg-6 col-md-8 col-sm-7">
            @include('shared.success_message')
            @include('posts.shared.submit_post')
            <hr>
            {{-- Forelse can be used instead of if --}}
            @if(count($posts) > 0)
                @foreach($posts as $post)
                    <div class="mt-4">
                        @include('shared.post_card')
                    </div>
                @endforeach
            @else
                <p class="alert alert-danger mt-4">No Results Found.</p>
            @endif
            {{$posts->withQueryString()->links()}}
        </div>
        <div class="col-lg-3 d-none d-md-block">
            <div class="row">
                <div class="col">
                    @include('shared.search_bar')
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    @include('shared.follow_box')
                </div>
            </div>
        </div>
    </div>
@endsection
