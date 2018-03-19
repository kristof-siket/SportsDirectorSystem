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
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">Distances</h4>
            <ul class="list-group">
                @if(empty($competition->distances))
                    <b>At the moment, there are no distances for this competition!</b>
                @else
                    @foreach($competition->distances as $distance)
                        <a href="{{ route('results.enter', ['comp_id' => $competition->comp_id, 'dist_id' => $distance->distance_id]) }}">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {!! $distance->distance->distance_name !!}
                                <span class="badge badge-primary badge-pill">{!! count($distance->competition->results->where('result_distance', $distance->distance_id)) !!}</span>
                            </li>
                        </a>
                    @endforeach
                @endif
            </ul>
        </a>
    </div>

</div>
@endsection