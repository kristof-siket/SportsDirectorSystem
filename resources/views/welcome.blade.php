@extends('layouts.app')
@section('primary')
    <div class="col-md-12">
    <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1>Hello, {{ Auth::user()->first_name }}!</h1>
                <p>
                    Please, check the side menu to browse the functions of this application.
                    Click the button to jump to your dashboard!
                </p>
                <p><a class="btn btn-info btn-lg" href="{{ route('dashboard') }}" role="button">Dashboard &raquo;</a></p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Recent events recommended to you</div>
                <div class="panel-body">
                    <!-- Example row of columns -->
                    <div class="row">
                        @foreach($recent_comps as $r)
                            <div class="col-md-4">
                                <h2>{{ $r->comp_name }}</h2>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                       <b>Date: </b><i>{{ $r->comp_date }}</i>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Sport: </b><i>{{ $r->sport->sport_name }}</i>
                                    </li>
                                </ul>
                                <p><a class="btn btn-default" href="{{ route('competitions.show', ['comp_id' => $r->comp_id]) }}" role="button">View details &raquo;</a></p>
                            </div>
                        @endforeach
                    </div>
                </div>
        </div>
    </div>
@endsection