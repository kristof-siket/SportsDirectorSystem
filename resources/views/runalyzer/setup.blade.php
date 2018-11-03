@extends('layouts.app');

@section('primary')
    <br/>
    <br/>
@endsection

@section('content')

    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">Runalyzer - Set up for analysis</div>
        <div class="panel-body">
            <div class="form-group">
                <form method="get" action="{{ route('runalyzer.create') }}">
                    {!! csrf_field() !!}
                    <label for="result_id">Select a result to set up for analysis...</label>
                    <select class="form-control" required name="result_id">
                        @foreach ($results as $result)
                            <option value="{{ $result->getResultId() }}">{{ $results[$loop->iteration - 1]->getResultCompetition()->getCompName() }}
                                - {{ $results[$loop->iteration - 1]->getResultDistance()->getDistanceName() }}
                                ({{$results[$loop->iteration - 1]->getResultAthlete()->getFirstName()}} {{ $results[$loop->iteration - 1]->getResultAthlete()->getLastName() }}
                                )
                            </option>
                        @endforeach
                    </select>
                    <input type="submit" value="Setup" class="form-control btn btn-sm btn-success">
                </form>
            </div>
        </div>
    </div>
@endsection