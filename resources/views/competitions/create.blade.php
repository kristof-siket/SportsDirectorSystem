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
                    <form>
                        <div class="form-group">
                            <label for="comp_name">Name of competition</label>
                            <input type="text" class="form-control" id="comp_name" placeholder="Enter the name of the new event">
                        </div>
                        <div class="form-group">
                            <label for="comp_location">Location of competition</label>
                            <input type="text" class="form-control" id="comp_location" placeholder="Where is the competition held?">
                        </div>
                        <div class="form-group">
                            <label for="comp_name">Date of competition</label>
                            <input type="date" class="form-control" id="comp_date" placeholder="The date of the competition">
                        </div>
                        <div class="form-group">
                            <label for="comp_sport">The main sport of the competition (select one)</label>
                            <select class="form-control" id="comp_sport">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="comp_distances">Distances of the competition (select multiple)</label>
                            <select multiple class="form-control" id="comp_distances">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Save event</button>
                    </form>
                </div>
            </form>
        </div>
    </div>
@endsection