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
            <div id ='myChart' class="col-md-6">
                <script type="text/javascript">
                    document.addEventListener("DOMContentLoaded", function(){
                        var myConfig = {"type":"line",
                            "series":[
                                {
                                    "values": {!! json_encode($pulses) !!} ,
                                    "text": "Pulse"
                                },
                            ],
                            "plot": {
                                "aspect": "spline"
                            },
                            "legend": {
                                "highlight-plot": true
                            }
                        };

                        zingchart.render({
                            id : 'myChart',
                            data : myConfig,
                            height: "100%",
                            width: "100%"
                        });
                    });
                </script>
            </div>
            <div id ='myChart2' class="col-md-6">
                <script type="text/javascript">
                    document.addEventListener("DOMContentLoaded", function(){
                        var myConfig = {"type":"line",
                            "series":[
                                {
                                    "values": {!! json_encode((array_values($tempos))) !!},
                                    "text": "Tempo"
                                }
                            ],
                            "plot": {
                                "aspect": "spline", "line-color": "red"
                            },
                            "legend": {
                                "highlight-plot": true
                            }
                        };

                        zingchart.render({
                            id : 'myChart2',
                            data : myConfig,
                            height: "100%",
                            width: "100%",
                            foreground: "red"
                        });
                    });
                </script>
            </div>
        </div>
    </div>
@endsection