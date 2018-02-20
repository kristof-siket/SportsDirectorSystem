@extends('layouts.app');

@section('primary')
    <br/>
    <br/>
@endsection

@section('content')

    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">Create new competition</div>
        <div class="panel-body">
            <form method="post" action="{{ route('competitions.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                        <div class="form-group">
                            <label for="comp_name">Name of competition</label>
                            <input type="text" class="form-control" id="comp_name" name="comp_name" placeholder="Enter the name of the new event">
                        </div>
                        <div class="form-group">
                            <label for="comp_location">Location of competition</label>
                            <input type="text" class="form-control" id="comp_location" name="comp_location" placeholder="Where is the competition held?">
                        </div>
                        <div class="form-group">
                            <label for="comp_date">Date of competition</label>
                            <input type="date" class="form-control" id="comp_date" name="comp_date" placeholder="The date of the competition">
                        </div>
                        <div class="form-group">
                            <label for="comp_sport">The main sport of the competition (select one)</label>
                            <select class="form-control" id="comp_sport" name="comp_sport">
                                @foreach(App\Sport::all() as $sport)
                                    <option value="{{ $sport->sport_id }}">{{ $sport->sport_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Save event</button>
                </div>
            </form>
        </div>
    </div>
@endsection