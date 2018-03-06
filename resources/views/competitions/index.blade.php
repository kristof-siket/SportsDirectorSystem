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
            <div class="list-group">
                @foreach($competitions as $competition)
                    <p class="list-group-item col-md-12">
                        <a href="{!! route('competitions.show', ['comp_id' => $competition->comp_id]) !!}" class="list-group-item-text">{!! $competition->comp_name !!}</a>
                        <a href="{!!  route('results.index', ['comp_id' => $competition->comp_id]) !!}" class="btn btn-info col-md-12">See competitors</a>
                    </p>
                @endforeach
            </div>
            <a href="{{ route('competitions.create') }}" class="btn btn-success">New Event</a>
        </div>
    </div>
@endsection