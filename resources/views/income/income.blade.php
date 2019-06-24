@extends('home.home_user')
@section('content')
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                {{--<div class="card-body">--}}
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"--}}
                               {{--aria-selected="true">Home</a>--}}
                        {{--</li>--}}
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                               aria-selected="false">{!! trans('messages.finance.front') !!}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link back" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                               aria-selected="false">{!! trans('messages.finance.back') !!}</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="col-md-12 stretch-card">
                                {{--<div class="card">--}}
                                    <div class="card-body">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">{!! trans('messages.finance.income') !!}</h3>
                                        </div>
                                        <div class="panel panel-default" id="panel-lead-list">
                                            <div class="panel-body" id="landing-subject-list">
                                                <form method="POST" id="search-form" action="#" accept-charset="UTF-8" class="form-horizontal">
                                                    <div class="row">
                                                        <lable class="col-sm-2 control-label"></lable>
                                                        <div class="col-sm-3 block-input">
                                                            <input class="form-control" type="date" size="25" placeholder="{!! trans('messages.date') !!}" name="date">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <lable class="col-sm-2 control-label">{!! trans('messages.to') !!}</lable>
                                                        <div class="col-sm-3 block-input">
                                                            <input class="form-control" type="date" size="25" placeholder="{!! trans('messages.date') !!}" name="date_to">
                                                        </div>

                                                        <lable class="col-sm-2 control-label">{!! trans('messages.go') !!}</lable>
                                                        <div class="col-sm-3 block-input">
                                                            <input class="form-control" type="date" size="25" placeholder="{!! trans('messages.date') !!}" name="date_go">
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
                                {{--</div>--}}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="col-md-12 stretch-card">
                                {{--<div class="card">--}}
                                <div class="card-body">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">{!! trans('messages.finance.income_') !!}</h3>
                                    </div>
                                    <div class="panel panel-default" id="panel-lead-list">
                                        <div class="panel-body" id="landing-subject-list">
                                            <form method="POST" id="search-form1" action="#" accept-charset="UTF-8" class="form-horizontal">
                                                <div class="row">
                                                    <lable class="col-sm-2 control-label"></lable>
                                                    <div class="col-sm-3 block-input">
                                                        <input class="form-control" type="date" size="25" placeholder="{!! trans('messages.date') !!}" name="date">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <lable class="col-sm-2 control-label">{!! trans('messages.to') !!}</lable>
                                                    <div class="col-sm-3 block-input">
                                                        <input class="form-control" type="date" size="25" placeholder="{!! trans('messages.date') !!}" name="date_to">
                                                    </div>

                                                    <lable class="col-sm-2 control-label">{!! trans('messages.go') !!}</lable>
                                                    <div class="col-sm-3 block-input">
                                                        <input class="form-control" type="date" size="25" placeholder="{!! trans('messages.date') !!}" name="date_go">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12 text-right">
                                                        <button type="reset" class="btn btn-white reset-s-btn">{!! trans('messages.reset') !!}</button>
                                                        <button type="button" class="btn btn-secondary search-store1">{!! trans('messages.search') !!}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                {{--</div>--}}
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="panel-body show" id="landing-subject-list">
                            <div class="table-responsive show_">
                                {!! Form::model(null,array('url' => array('/employee/save/income'),'class'=>'form-horizontal form_add create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                                <table class="table itemTables" style="width: 100%">
                                    <tr>
                                        <th ></th>
                                        <th>{!! trans('messages.number') !!}</th>
                                        <th>{!! trans('messages.finance.code') !!}</th>
                                        <th>{!! trans('messages.finance.total') !!}</th>
                                        <th>{!! trans('messages.finance.date') !!}</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="panel-body show" id="landing-subject-list">
                            <div class="table-responsive show_">
                                <table class="table" style="width: 100%">
                                    <tr>
                                        <td style="text-align: right; font-weight: bold;" colspan="2">{!! trans('messages.total') !!}</td>
                                        <td style="text-align: right;"><input type="text" name="income" class="income form-control" readonly><span class="income_"></span></td>
                                        <td>{!! trans('messages.payment.bath') !!}</td>
                                    </tr>
                                </table>
                                <div class="panel-body float-right" id="landing-subject-list">
                                    <button class="btn-info btn-primary" id="add-store-btn" type="submit">Save</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="show_online">
        @include('income.income_element')
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/js/jquery-validate/jquery.validate.min.js"></script>

    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>--}}

    <script type="text/javascript">
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.show_online').hide();

            $('.back').on('click',function(){
                //alert('aa');
                $('.itemRow').html('');
                $('.income').html('');
                $('.show_').hide();
            });

            $('.show').hide();
            $('.search-store').on('click',function(){
                var data  = $('#search-form').serialize();
                //alert('aa');


                $.ajax({
                    url : '/employee/list_income_list',
                    method : 'post',
                    dataType : 'JSON',
                    data : data,
                    success : function(e){
                        //console.log(e.order_);
                        $('.itemRow').html('');
                        $('.show').show();
                        $('.show_').show();

                        var data_ =[];
                        var grand_total = 0 ;

                        $.each(e.order, function(i, val){
                            var time = $.now();
                            var number = i + 1;
                                grand_total += val.grand_total;
                            data_ = ['<tr class="itemRow">',
                                '<td></td>',
                                '<td style="text-align: left;">'+number+'</td>',
                                '<td><input type="hidden" name="data['+i+'][code_order]" value="'+val.code_order+'">' +
                                '    <input type="hidden" name="data['+i+'][id_order]" value="'+val.id+'">'+val.code_order+'</td>',
                                '<td>'+val.grand_total+'</td>',
                                '<td>'+val.created_at+'</td>',
                            ];
                            data_.push(
                                '<td><div class="text-right">' +
                                '<span class="colTotal"></span> </div><input class="tLineTotal" name="" type="hidden" value="'+e.order_+'"></td>', '</tr>');
                            data_ = data_.join('');
                            $('.itemTables').append(data_);
                        });
                        $('.income').val(e.order_);
                        $('.income_').val(e.order_);
                    } ,error : function(){
                        console.log('Error Search Data Store');
                    }
                });
            });

            $('body').on('click','.search-store1',function(){
                var data  = $('#search-form1').serialize();
                //alert('aa');


                $.ajax({
                    url : '/employee/list_income_online',
                    method : 'post',
                    dataType : 'JSON',
                    data : data,
                    success : function(e){
                        console.log(e.order);
                        $('.itemRow1').html('');
                        $('.show').hide();
                        $('.show_').hide();
                        $('.show_online').show();

                        var data_ =[];
                        var grand_total = 0 ;

                        $.each(e.order, function(i, val){
                            var time = $.now();
                            var number = i + 1;
                            grand_total += val.grand_total;
                            data_ = ['<tr class="itemRow1">',
                                '<td></td>',
                                '<td style="text-align: left;">'+number+'</td>',
                                '<td><input type="hidden" name="data['+i+'][code_order]" value="'+val.code_order+'">' +
                                '    <input type="hidden" name="data['+i+'][id_order]" value="'+val.id+'">'+val.code_order+'</td>',
                                '<td>'+val.grand_total+'</td>',
                                '<td>'+val.created_at+'</td>',
                            ];
                            data_.push(
                                '<td><div class="text-right">' +
                                '<span class="colTotal"></span> </div><input class="tLineTotal" name="" type="hidden" value="'+e.order_+'"></td>', '</tr>');
                            data_ = data_.join('');
                            $('.itemTables1').append(data_);
                        });
                        $('.income').val(e.order_);
                        $('.income_').val(e.order_);
                    } ,error : function(){
                        console.log('Error Search Data Store');
                    }
                });
            });
        });
    </script>
@endsection