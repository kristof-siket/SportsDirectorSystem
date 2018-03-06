@extends('layouts.app');

@section('primary')
    <br/>
    <br/>
@endsection

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">The actual list of participants</h3>
        </div>
        <div class="panel-body">
            <div class="list-group">
                @foreach($results as $result)
                    <a href="#" class="list-group-item">{!! $result->athlete()->first_name . " " . $result->athlete()->last_name !!}</a>
                @endforeach
            </div>
        </div>
    </div>
@endsection