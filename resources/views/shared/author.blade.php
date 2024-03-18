@extends('layouts.layout')
@section('title', 'Author Page')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card overflow-hidden">
                @include('shared.left_sidebar')
            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-3">
                <img src="{{ asset('images/author.jpg') }}" class="card-img-top" alt="Author Photo">
                <div class="card-body">
                    <h5 class="card-title">Mateja Rastoder</h5>
                    <p class="card-text">Third year web development student at the ICT College of Vocational Studies Belgrade</p>
                </div>
            </div>
            <h1>About Me</h1>
            <p>I specialize in developing
                responsive web
                applications using PHP,
                JavaScript, HTML, CSS,
                JQuery, Bootstrap, and
                related technologies.
                Committed to continuous
                learning and growth within
                the field of web
                development, I am highly
                self-motivated with
                excellent communication
                and teamwork skills.</p>
        </div>
        <div class="col-md-3">
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
