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

            <select id="result" name="result">
                <option value="">Pick a result..</option>
                @for ($i = 0; $i < count($results); $i++)
                    <option value="{{ $ids[$i] }}">{{ $results[$i] }}</option>
                @endfor

            </select>
            <br>
            {!! Form::submit('Runalyze Me!', ['class' => 'btn btn-success']); !!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection