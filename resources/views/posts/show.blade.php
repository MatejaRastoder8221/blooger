@extends('layouts.layout')
@section('title','Post view')
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
                    @include('shared.post_card')
                </div>
        </div>
        <div class="col-3">
            @include('shared.search_bar')
            @include('shared.follow_box')
        </div>
    </div>
@endsection


