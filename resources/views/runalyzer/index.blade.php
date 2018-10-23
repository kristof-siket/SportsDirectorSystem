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
                    <option value="{{ $results[$i]->getResultId() }}">
                        {{ $results[$i]->getResultCompetition()->getCompName() }}
                        - {{ $results[$i]->getResultDistance()->getDistanceName() }}
                        ({{$results[$i]->getResultAthlete()->getFirstName()}} {{ $results[$i]->getResultAthlete()->getLastName() }}
                        )
                    </option>
                @endfor
            </select>

            <br>
            {!! Form::label('analysis_type', 'Select an analysis type:'); !!}

            <br>
            <div class="col-md-12">
                <div class="list-group text-justify form-group">
                    <li class="list-group-item list-group-item-info"><b>Pulse and speed graphs:</b><input type="radio"
                                                                                                          class="radio"
                                                                                                          id="analysis_type_graph"
                                                                                                          name="analysis_type"
                                                                                                          value="graph">
                    </li>
                    <li class="list-group-item list-group-item-info"><b>Personal Statistics:</b><input type="radio"
                                                                                                       class="radio"
                                                                                                       id="analysis_type_stat"
                                                                                                       name="analysis_type"
                                                                                                       value="stat">
                    </li>
                    <li class="list-group-item list-group-item-info"><b>Overall competitions stats:</b><input
                                type="radio" class="radio" id="analysis_type_racestat" name="analysis_type"
                                value="race_stat"></li>
                </div>
            </div>
            <br>
            <br>
            {!! Form::submit('Runalyze Me!', ['class' => 'btn btn-success']); !!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection