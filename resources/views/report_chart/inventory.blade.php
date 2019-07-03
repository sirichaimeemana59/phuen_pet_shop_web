@extends('home.home_user')
@section('content')
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.sale_good.inventory') !!}</h3>
                    </div>
                    <div class="panel-body search-form">
                        <form method="POST" id="search-form" action="#" accept-charset="UTF-8" class="form-horizontal">
                            {{--<div class="row">--}}
                                {{--<lable class="col-sm-2 control-label"></lable>--}}
                                {{--<div class="col-sm-3 block-input">--}}
                                    {{--<input class="form-control" type="date" size="25" placeholder="{!! trans('messages.date') !!}" name="date">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<br>--}}
                            {{--<div class="row">--}}
                                {{--<lable class="col-sm-2 control-label">{!! trans('messages.to') !!}</lable>--}}
                                {{--<div class="col-sm-3 block-input">--}}
                                    {{--<input class="form-control" type="date" size="25" placeholder="{!! trans('messages.date') !!}" name="date_to">--}}
                                {{--</div>--}}

                                {{--<lable class="col-sm-2 control-label">{!! trans('messages.go') !!}</lable>--}}
                                {{--<div class="col-sm-3 block-input">--}}
                                    {{--<input class="form-control" type="date" size="25" placeholder="{!! trans('messages.date') !!}" name="date_go">--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="row">
                                <lable class="col-sm-2 control-label">{!! trans('messages.group.title') !!}</lable>
                                <div class="col-sm-3 block-input">
                                    <select name="group_id" id="" class="form-control">
                                        <option value="">{!! trans('messages.selete_group') !!}</option>
                                        @foreach($cat as $key => $val)
                                            <option value="{!! $val->id !!}">{!! $val{'name_'.Session::get('locale')} !!}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <lable class="col-sm-2 control-label">{!! trans('messages.category.title') !!}</lable>
                                <div class="col-sm-3 block-input">
                                    <select name="cat_id" id="" class="form-control">
                                        <option value="">{!! trans('messages.selete_cat') !!}</option>
                                        @foreach($cat_tran as $key => $val)
                                            <option value="{!! $val->id !!}">{!! $val{'name_'.Session::get('locale')} !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button type="reset" class="btn btn-white reset-s-btn">{!! trans('messages.reset') !!}</button>
                                    <button type="button" class="btn btn-secondary search-store">{!! trans('messages.search') !!}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- //search --}}
    <br>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.sale_good.inventory') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="panel-body" id="landing-subject-list">

                            <div class="demo-container">
                                <div id="chart"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/js/jquery-validate/jquery.validate.min.js"></script>

    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.0/knockout-min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.2/angular.min.js"></script>
    <link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/19.1.4/css/dx.common.css">
    <link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/19.1.4/css/dx.light.css">
    <script type="text/javascript" src="https://cdn3.devexpress.com/jslib/19.1.4/js/dx.all.js"></script>

    <script type="text/javascript" src="{!! url('/') !!}/js_/js/datepicker/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="{!! url('/') !!}/js_/js/datepicker/bootstrap-datepicker.th.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('.add-store').on('click',function(){
                $('#add-store').modal('show');
            });

            $('body').on('click','.search-store', function () {
                var data  = $('#search-form').serialize();
                console.log(data);
                $.ajax({
                    url: $('#root-url').val() + "/report/chart/inventory",
                    data: data,
                    dataType: "json",
                    method: 'post',
                    success: function (h) {
                        //console.log(h);
                        renderGraph_sale_good(h);
                    }
                });
            });

            function numberWithCommas(number) {
                if(number == null){
                    number = 0;
                }else{
                    number = number;
                }
                var parts = number.toString().split(".");
                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                return parts.join(".");
            }

            function renderGraph_sale_good(h){
                var populationData = [];



                var name = [];
                $.each(h, function (i,v) {
                    if(h) {
                        populationData.push({type:v.name_{!! Session::get('locale') !!},value:numberWithCommas(v.amount)});
                    }
                });

                //console.log(name);
                console.log(populationData);
                $('#chart').dxChart('instance').option('dataSource', populationData);
                $('#chart').dxChart('instance').render();
            }

            // $(function(){
            //     $("#chart").dxChart({
            //         dataSource: populationData,
            //         commonSeriesSettings: {
            //             argumentField: "type",
            //             type: "bar"
            //         },
            //         legend: {
            //             visible: false
            //         },
            //         series: {
            //             valueField: "1", number: "1",
            //         },
            //         argumentAxis: {
            //             tickInterval: 10,
            //             label: {
            //                 format: {
            //                     type: "decimal"
            //                 }
            //             }
            //         },title: {
            //         text: "Chart",
            //             subtitle: {
            //             text: "(Millions of Tons, Oil Equivalent)"
            //         }
            //     },
            //     "export": {
            //         enabled: true
            //     },
            //     tooltip: {
            //         enabled: true,
            //             customizeTooltip: function (arg) {
            //             return {
            //                 text: arg.valueText
            //             };
            //         }
            //     }
            //     }).dxChart("instance");
            // });
            var populationData = [];
            $(function(){
                $("#chart").dxChart({
                    palette: "Violet",
                    dataSource: populationData,
                    commonSeriesSettings: {
                        argumentField: "type",
                        type: "bar"
                    },
                    margin: {
                        bottom: 20
                    },
                    argumentAxis: {
                        valueMarginsEnabled: false,
                        discreteAxisDivisionMode: "crossLabels",
                        grid: {
                            visible: true
                        }
                    },
                    series: [
                        {
                            valueField: "value",
                            name : "product",
                        }

                    ],
                    legend: {
                        verticalAlignment: "bottom",
                        horizontalAlignment: "center",
                        itemTextPosition: "bottom"
                    },
                    title: {
                        text: "Inventory",
                        subtitle: {
                            text: "(Product)"
                        }
                    },
                    "export": {
                        enabled: true
                    },
                    tooltip: {
                        enabled: true,
                        customizeTooltip: function (arg) {
                            return {
                                text: arg.valueText
                            };
                        }
                    }
                }).dxChart("instance");
            });


        });
    </script>
@endsection