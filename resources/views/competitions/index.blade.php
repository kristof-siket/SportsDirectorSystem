@extends('layouts.app');

@section('primary')
<br/>
<br/>
@endsection

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Recent competitions you can enter</h3>
        </div>
        <div class="panel-body">
            <a href="{{ route('competitions.create') }}" class="btn btn-success btn-lg">New Event</a>
        </div>
        <div class="panel-body  pre-scrollable">
            <div class="list-group">
                @foreach ($competitions as $comp)

                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h4 class="text-primary mb-1">{!! $comp->comp_name !!}</h4>
                            <small>{!! \Carbon\Carbon::parse($comp->comp_date)->format('h:m d/M/Y') !!}</small>
                        </div>
                        <div class="btn-group-horizontal">
                            <a href="{{route('competitions.show', ['comp_id' => $comp->comp_id])}}"
                               class="btn btn-sm btn-primary">See details</a>
                            <a href="{{route('results.index', ['comp_id' => $comp->comp_id])}}"
                               class="btn btn-sm btn-info">Results</a>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
@endsection