@extends('layouts.app');

@section('primary')
    <br/>
    <br/>
@endsection

@section('content')

    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">Training planning</div>
        <div class="panel-body">
            {!! Form::open(['url' => action('TrainingPlansController@export'), 'method' => 'GET']) !!}

            {!! Form::label('sport', 'Your sport'); !!}
            <select id="sport" name="sport">
                @if (count($sports) == 0)
                    <option>No sports detected.</option>
                @else
                    @foreach($sports as $sport)
                        <option value="{!! $sport->getSportId() !!}">{!! $sport->getSportName() !!}</option>
                    @endforeach
                @endif
            </select>
            <br>
            {!! Form::label('experience', 'Years spent in sport'); !!}
            <select id="experience" name="experience">
                <option value="0">Beginner (0-0,5 years)</option>
                <option value="1">Catching-up (1-3 years)</option>
                <option value="2">Tenacious (3-5 years)</option>
                <option value="3">Advanced (5+ years)</option>
            </select>
            <br>
            {!! Form::submit('Export!', ['class' => 'btn btn-success btn-lg']); !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection