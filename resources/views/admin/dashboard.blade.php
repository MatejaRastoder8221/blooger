@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-4">
            <div class="card overflow-hidden">
                @include('admin.shared.left_sidebar')
            </div>
        </div>
        <div class="col-lg-9 col-md-8">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h1>Admin Log</h1>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Text</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($logs as $log)
                                    <tr>
                                        <td>{{ $log['date'] }}</td>
                                        <td>{{ $log['text'] }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
