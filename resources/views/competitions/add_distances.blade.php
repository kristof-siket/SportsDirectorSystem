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
                <form method="post" action="{{ route('competitions.storeDistances', ['comp_id' => $comp->comp_id]) }}">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="comp_distances">The main sport of the competition (select one)</label>
                            <select multiple class="form-control" id="comp_distances" name="comp_distances[]">
                                @foreach(App\Distance::all() as $distance)
                                    <option value="{{ $distance->distance_id }}">{{ $distance->distance_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection