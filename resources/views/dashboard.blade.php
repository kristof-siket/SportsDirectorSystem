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
                                    @foreach($competitions as $competition)
                                        {!! $competition->comp_name !!}
                                    @endforeach
                                    Content
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="panel panel-info">
                                <div class="panel-heading">Recent events</div>
                                <div class="panel-body">
                                    Content
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="panel panel-info">
                                <div class="panel-heading">Training plans</div>
                                <div class="panel-body">
                                    Content
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
