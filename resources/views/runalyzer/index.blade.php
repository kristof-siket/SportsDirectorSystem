@extends('layouts.app');

@section('primary')
    <br/>
    <br/>
@endsection

@section('content')

    <div class="panel panel-primary">
        <!-- Default panel contents -->
        <div class="panel-heading">Runalyzer</div>
        <div class="panel-body">
            <div id ='myChart'>
                <script type="text/javascript">
                    document.addEventListener("DOMContentLoaded", function(){
                        var myConfig = {"type":"line",
                            "series":[
                                {"values": {!! json_encode($pulses) !!} },
                                {"values": {!! json_encode((array_values($tempos))) !!} }
                            ],
                            "plot": {"aspect": "spline"}  };

                        zingchart.render({
                            id : 'myChart',
                            data : myConfig,
                            height: "100%",
                            width: "100%"
                        });
                    });
                </script>
            </div>

        </div>
    </div>
@endsection