@extends('layouts.app');

@section('primary')
    <br/>
    <br/>
@endsection

@section('content')

    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">Runalyzer</div>
        <div class="panel-body">
           <ul class="list-group">
                <li class="list-group-item">Max pulse: {{ $stats['max_pulse'] }}</li>
                <li class="list-group-item">Average pulse: {{ $stats['avg_pulse'] }}</li>
                <li class="list-group-item">Max tempo: {{ $stats['max_tempo'] }}</li>
                <li class="list-group-item">Average tempo: {{ $stats['avg_tempo'] }}</li>
            </ul>    
        </div>
    </div>
@endsection