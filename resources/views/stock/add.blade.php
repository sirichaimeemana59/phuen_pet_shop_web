@extends('home.home_user')
@section('content')
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.stock.title') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="panel-body" id="landing-subject-list">
                            {!! Form::model(null,array('url' => array('employee/product/add_to_stock'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                            <div class="form-group row">
                                <lable class="col-sm-2 control-label">{!! trans('messages.product.name_th') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::text('name_th',null,array('class'=>'form-control','placeholder'=>trans('messages.product.name_th'),'required')) !!}
                                </div>

                                <lable class="col-sm-2 control-label">{!! trans('messages.product.name_en') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::text('name_en',null,array('class'=>'form-control','placeholder'=>trans('messages.product.name_en'),'required')) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <lable class="col-sm-2 control-label">{!! trans('messages.product.photo') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::file('photo',null,array('class'=>'form-control')) !!}
                                </div>

                                <lable class="col-sm-2 control-label">{!! trans('messages.store.title') !!}</lable>
                                <div class="col-sm-4">
                                    <select name="store_id" id="" class="form-control">
                                        <option value="">{!! trans('messages.store.title') !!}</option>
                                        @foreach($company_ as $key => $val)
                                            <option value="{!! $val->id !!}">{!! $val->{'name_'.Session::get('locale')} !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <lable class="col-sm-2 control-label">{!! trans('messages.unit.title') !!}</lable>
                                <div class="col-sm-10">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr style="text-align: center;">
                                                <th width="*"></th>
                                                <th>{!! trans('messages.unit.name_th') !!}</th>
                                                <th>{!! trans('messages.unit.name_en') !!}</th>
                                                <th>{!! trans('messages.unit.amount') !!}</th>
                                                <th>{!! trans('messages.unit.amount_unit') !!}</th>
                                                {{--<th>{!! trans('messages.unit.price') !!}</th>--}}
                                                {{--<th>{!! trans('messages.unit.amount_unit') !!}</th>--}}
                                                {{--<th>{!! trans('messages.unit.title') !!}<br>--}}
                                                    {{--<button class="btn btn-success mt-2 mt-xl-0 text-right add-unit" type="button"><i class="fa fa-archive"></i>  {!! trans('messages.unit.add_unit') !!}</button>--}}
                                                {{--</th>--}}
                                            </tr>

                                            <tr>
                                                <td>{!! trans('messages.unit.unit_small') !!}</td>
                                                <td><input type="text" name="name_unit_th" class="form-control name_th" required></td>
                                                <td><input type="text" name="name_unit_en" class="form-control name_en" required></td>
                                                <td><input type="text" name="amount1" class="form-control num" readonly value="1"></td>
                                            </tr>
                                    @for($i=1;$i<=4;$i++)
                                        @if($i == 1)
                                            <?php
                                                $required = "required";
                                            ?>
                                            @else
                                            <?php
                                            $required = "";
                                            ?>
                                        @endif
                                                <tr>
                                                    <td></td>
                                                    <td><input type="text" name="data[{!!$i !!}][name_th]" class="form-control name_th"  {!! $required !!}></td>
                                                    <td><input type="text" name="data[{!!$i !!}][name_en]" class="form-control name_en" {!! $required !!}></td>
                                                    <td><input type="text" name="data[{!!$i !!}][amount]" class="form-control num" {!! $required !!}></td>
                                                    <td><input type="text" name="data[{!!$i !!}][amount_unit]" class="form-control num" {!! $required !!}></td>
                                                    {{--<td><input type="text" name="data[{!!$i !!}][price]" class="form-control num" {!! $required !!}></td>--}}
                                                    {{--<td><input type="text" name="data[{!!$i !!}][amount_unit]" class="form-control num" {!! $required !!}></td>--}}
                                                    {{--<td><input name="data[{!!$i !!}][amount_unit]" class="form-control" {!! $required !!}></td>--}}
                                                    {{--<td>--}}
                                                        {{--<select name="data[{!!$i !!}][unit_amount]" id="" {!! $required !!}>--}}
                                                            {{--<option value="">{!! trans('messages.unit.title') !!}</option>--}}
                                                            {{--@if($unit)--}}
                                                                {{--@foreach($unit as $val)--}}
                                                                    {{--<option value="{!! $val->id !!}">{!! $val{'name_'.Session::get('locale')} !!}</option>--}}
                                                                {{--@endforeach--}}
                                                            {{--@endif--}}
                                                        {{--</select>--}}
                                                    {{--</td>--}}
                                                </tr>
                                    @endfor
                                        </table>
                                    </div>
                                </div>
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
                    <div class="form-group row float-right" style="text-align: center; ">
                        <div class="col-sm-12">
                            <button class="btn-info btn-primary" id="add-store-btn" type="submit">Save</button>
                            <button class="btn-info btn-warning" type="reset">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

    <!-- Modal add unit-->
    {{--<div class="modal fade" id="add-unit" role="dialog">--}}
        {{--<div class="modal-dialog modal-lg">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header" style="background-color: #9BA2AB;">--}}
                    {{--<h4 class="modal-title" style="color: #bbbfc3;">{!! trans('messages.unit.add_unit') !!}</h4>--}}
                    {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-sm-12">--}}
                            {{--<div class="form">--}}
                                {{--{!! Form::model(null,array('url' => array('employee/unit/add'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}--}}
                                {{--<div class="form-group row">--}}
                                    {{--<lable class="col-sm-2 control-label">{!! trans('messages.product.name_th') !!}</lable>--}}
                                    {{--<div class="col-sm-4">--}}
                                        {{--{!! Form::text('name_th',null,array('class'=>'form-control','placeholder'=>trans('messages.product.name_th'),'required')) !!}--}}
                                    {{--</div>--}}

                                    {{--<lable class="col-sm-2 control-label">{!! trans('messages.product.name_en') !!}</lable>--}}
                                    {{--<div class="col-sm-4">--}}
                                        {{--{!! Form::text('name_en',null,array('class'=>'form-control','placeholder'=>trans('messages.product.name_en'),'required')) !!}--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="form-group row float-center" style="text-align: center; ">--}}
                                    {{--<div class="col-sm-12">--}}
                                        {{--<button class="btn-info btn-primary" id="add-store-btn" type="submit">Save</button>--}}
                                        {{--<button class="btn-info btn-warning" type="reset">Reset</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--{!! Form::close() !!}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}
    <!-- End Modal add unit-->
@endsection

@section('script')
    <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/js/jquery-validate/jquery.validate.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#add-store-btn').on('click',function () {
                if($('.create-store-form').valid()) {
                    $(this).attr('disabled','disabled').prepend('<i class="fa-spin fa-spinner" style="color: red;"></i> ');
                    $('.create-store-form').submit();
                }
            });

            $(".num").on("keypress" , function (e) {

                var code = e.keyCode ? e.keyCode : e.which;

                if(code > 57){
                    return false;
                }else if(code < 48 && code != 8){
                    return false;
                }

            });

            $('body').on('click','.amount',function(){

                var this_ = $(this);
                var name =  this_.parents('tr').find('.name_th').val();
                console.log(name);
                this_.parents('tr').find('.unit_amount').append("<option value=''>"+name+"</option>");
                return false;
            });

            $('.add-unit').on('click',function(){
                $('#add-unit').modal('show');
            });

        });
    </script>
@endsection