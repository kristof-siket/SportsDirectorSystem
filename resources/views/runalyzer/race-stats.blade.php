@extends('layouts.app');

@section('primary')
    <br/>
    <br/>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-primary">
                <div class="panel-heading">Result statistics - {{ $competition->getCompName() }}
                    - {!! $competition->getCompDate()->format('h:m d/M/Y') !!}</div>
                <div class="panel-body pre-scrollable">
                    <div class="col-md-12">
                        <div class="well well-sm col-md-3">
                            <div class="panel-heading"><b class="text-primary">Team Champions</b></div>
                            @foreach ($race_stats['team_champions'] as $champion)
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">{!! $champion['Team'] !!}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Champion: {!! $champion["Name"] !!}
                                            ({!! $champion['Distance'] !!})</h6>
                                        <p class="card-text">Average
                                            tempo: {!! number_format($champion['Average'], 2, '.', ','); !!} km/h</p>
                                    </div>
                                </div>
                                <hr color="black">
                            @endforeach
                        </div>
                        <div class="well well-sm col-md-3">
                            <div class="panel-heading"><b class="text-primary">Lowest average pulse (all distances)</b>
                            </div>
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Athlete: {!! $race_stats['lowest_avg_pulse']['Name'] !!}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Average
                                        pulse: {!! number_format($race_stats['lowest_avg_pulse']['AveragePulse'], 2, '.', ','); !!}
                                        bpm</h6>
                                </div>
                            </div>
                            <hr color="black">
                        </div>
                        <div class="well well-sm col-md-3">
                            <div class="panel-heading"><b class="text-primary">Highest average pulse (all distances)</b>
                            </div>
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Athlete: {!! $race_stats['highest_avg_pulse']['Name'] !!}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Average
                                        pulse: {!! number_format($race_stats['highest_avg_pulse']['AveragePulse'], 2, '.', ','); !!}
                                        bpm</h6>
                                </div>
                            </div>
                            <hr color="black">
                        </div>
                        <div class="well well-sm col-md-3">
                            <div class="panel-heading"><b class="text-primary">Best "Fitness" (Average pulse / Average
                                    tempo)</b></div>
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Athlete: {!! $race_stats['best_fitness']['Name'] !!}</h5>
                                    <p class="card-text">Average
                                        pulse: {!! number_format($race_stats['best_fitness']['AveragePulse'], 2, '.', ','); !!}
                                        km/h</p>
                                    <p class="card-text">Average
                                        tempo: {!! number_format($race_stats['best_fitness']['AverageTempo'], 2, '.', ','); !!}
                                        km/h</p>
                                    <p class="card-text text-primary">Value (After
                                        division): {!! number_format($race_stats['best_fitness']['Fitness'], 2, '.', ','); !!}
                                        km/h</p>
                                </div>
                            </div>
                            <hr color="black">
                        </div>
                    </div>
                    </div>
                </div>
        </div>
    </div>

@endsection