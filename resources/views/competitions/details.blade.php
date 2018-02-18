@extends('layouts.app');

@section('primary')
    <br/>
    <br/>
@endsection

@section('content')

<div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">{!! $competition->comp_name !!}</div>
    <div class="list-group">
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">Location</h4>
            <p class="list-group-item-text">{!! $competition->comp_location !!}</p>
        </a>

        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">Date</h4>
            <p class="list-group-item-text">{!! $competition->comp_date !!}</p>
        </a>

        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">Promoter</h4>
            <p class="list-group-item-text">{!! $competition->promoter->first_name . ' ' . $competition->promoter->last_name !!}</p>
        </a>
    </div>

</div>
@endsection