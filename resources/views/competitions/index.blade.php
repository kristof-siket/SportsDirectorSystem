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
                    <a href="{!! route('competitions.show', ['comp_id' => $competition->comp_id]) !!}" class="list-group-item">{!! $competition->comp_name !!}</a>
                @endforeach
            </div>
        </div>
    </div>
@endsection