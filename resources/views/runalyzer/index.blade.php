@extends('layouts.app');

@section('primary')
    <br/>
    <br/>
@endsection

@section('content')
    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">Run a competition analysis</div>
        <div class="panel-body">
            {!! Form::open(['url' => action('RunalyzerController@show'), 'method' => 'GET']) !!}

            {!! Form::label('result', 'Select a competition result to analyze...'); !!}
            {!! Form::select('result', array_pluck($results, 'result_id', 'result_id'), ['placeholder' => 'Pick a result..']) !!}
            <br>
            {!! Form::submit('Runalyze Me!', ['class' => 'btn btn-success']); !!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection