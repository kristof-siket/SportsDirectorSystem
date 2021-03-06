@extends('layouts.app')

@section('primary')<br><br>@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="col-md-2">
                            <div class="panel panel-info">
                                <div class="panel-heading">Profile settings</div>
                                <div class="panel-body">
                                    <ul class="list-group">
                                        <a href="#"><li class="list-group-item list-group-item-text"><span class="glyphicon glyphicon-cog"></span> Edit Profile</li></a>
                                        <a  href="#"><li class="list-group-item list-group-item-text"><span class="glyphicon glyphicon-trash"></span> Unregister</li></a>
                                    </ul>
                                    @if (is_null(Auth::user()->getTeam()))
                                        <div class="form-group form-group-sm form-inline">
                                            <form title="Set your team" name="set_team" method="post"
                                                  action="{{ route('users.update', ['user' => Auth::user()]) }}">
                                                <input type="hidden" name="_method" value="PUT">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <fieldset>
                                                    <legend class="text-muted">Set your team</legend>
                                                    <div class="dropdown" style="box-sizing: padding-box">
                                                        <select style="max-width: 100%" name="user_team"
                                                                class="form-control">
                                                            <option style="-moz-white-space: pre-wrap; -o-white-space: pre-wrap; white-space: pre-wrap; overflow: hidden; text-overflow: ellipsis"
                                                                    value="null">No team
                                                            </option>
                                                            @foreach ($teams as $team)
                                                                <option style="-moz-white-space: pre-wrap; -o-white-space: pre-wrap; white-space: pre-wrap; overflow: hidden; text-overflow: ellipsis"
                                                                        value="{{ $team->getTeamId() }}">{{ $team->getTeamName() }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <input type="submit" class="form-control btn btn-primary btn-xs"
                                                           value="Save">
                                                </fieldset>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="panel panel-info">
                                <div class="panel-heading">My Events</div>
                                <div class="panel-body pre-scrollable">
                                    @if (count($competitions) > 0)
                                        <div class="list-group">
                                            @foreach ($competitions as $comp)
                                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <h4 class="text-primary mb-1">{!! $comp->comp_name !!}</h4>
                                                        <small>{!! \Carbon\Carbon::parse($comp->comp_date)->format('h:m d/M/Y') !!}</small>
                                                    </div>
                                                    <p class="mb-1">{!! $comp->distance_name !!}</p>
                                                    <small><p class="text-info">{!! ($comp->result_time == 0) ? "No time recorded" : gmdate('H:i:s', $comp->result_time) !!}</p></small>
                                                </a>
                                            @endforeach
                                        </div>
                                    @else
                                        <b class="text-info">You don't have any events yet!</b>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="panel panel-info">
                                <div class="panel-heading">Training plans</div>
                                    <div class="panel-body pre-scrollable">
                                        @if (count($trainingPlans) == 0)
                                            <b class="text-info">No training plans created yet!</b>
                                        @else
                                            <!-- List training plans here -->
                                        @endif
                                    </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
