@extends('layouts.app');

@section('primary')
    <br/>
    <br/>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Result statistics - {!! $statistics->comp_name !!}</div>
                    <div class="panel-body">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection