@extends('layouts.app');

@section('primary')
    <br/>
    <br/>
@endsection

@section('content')
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">The actual list of participants</h3>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    @if($results->isEmpty())
                        <li class="list-group-item list-group-item-warning">There are no results yet!</li>
                    @else
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Team</th>
                                <th scope="col">Distance</th>
                                <th scope="col">Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $result)
                                <tr>
                                    <td>{{$result->getResultTime() != 0 ? $loop->iteration : "N/A"}}</td>
                                    <td>{{ $result->getResultAthlete()->getFirstName() }} {{ $result->getResultAthlete()->getLastName()}}</td>
                                    <td>{{ $result->getResultAthlete()->getTeam() == null ? "Freelancer Competitor" : $result->getResultAthlete()->getTeam()->getTeamName()}}</td>
                                    <td>{{ $result->getResultDistance()->getDistanceName() }}</td>
                                    <td>{!! ($result->getResultTime() == PHP_INT_MAX) ? "No time recorded" : gmdate('H:i:s', $result->getResultTime()) !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endsection