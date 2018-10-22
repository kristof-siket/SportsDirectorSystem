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
                    @if($results->isEmpty())
                    <p class="list-group-item list-group-item-warning">There are no results yet!</p>
                    @else
                    <ul class="nav nav-tabs">
                        @foreach ($results as $groups)
                            <li class="nav-item {{ $loop->iteration == 1 ? 'active' : '' }}"><a data-toggle="tab"
                                                                                                href="#menu{{ $loop->iteration }}">{{ $groups->first()->getResultDistance()->getDistanceName() }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        @foreach($results as $groups)
                            <div id="menu{{ $loop->iteration }}"
                                 class="tab-pane fade{{ $loop->iteration == 1 ? 'in active' : ''}}">
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
                                    @foreach($groups as $result)
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
                            </div>
                        @endforeach
                    </div>
                    @endif
            </div>
        </div>
@endsection