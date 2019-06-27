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
                            {{--<div class="form-group row">--}}
                                {{--<label class="col-sm-2 control-label">{{ trans('messages.store.title') }}</label>--}}
                                {{--<div class="col-sm-10">--}}
                                    {{--{!! Form::select('company_id',$store,null,array('class'=>'form-control company')) !!}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group row">
                                <lable class="col-sm-2 control-label">{!! trans('messages.group.title') !!}</lable>
                                <div class="col-sm-4">
                                    <select name="group_id" id="" class="form-control select_cat" required="">
                                        <option value="">{!! trans('messages.selete_group') !!}</option>
                                        @foreach($cat as $key => $val)
                                            <option value="{!! $val->id !!}">{!! $val{'name_'.Session::get('locale')} !!}</option>
                                        @endforeach
                                    </select>
                                </div>


                                    <lable class="col-sm-2 control-label">{!! trans('messages.category.title') !!}</lable>
                                    <div class="col-sm-4 show">
                                        <input type="hidden" class="text" name="text" value="{!! trans('messages.selete_cat') !!}">
                                        <select name="cat_id" id="" class="form-control cat_tran" required="">
                                            <option value="">{!! trans('messages.selete_cat') !!}</option>
                                            @foreach($cat_tran as $key => $val)
                                                <option value="{!! $val->id !!}">{!! $val{'name_'.Session::get('locale')} !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>

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
                                <lable class="col-sm-2 control-label">{!! trans('messages.bar_code') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::text('bar_code',null,array('class'=>'form-control barcode','placeholder'=>trans('messages.bar_code'),'required')) !!}
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

            $(document).ready(function(){
                $('form').acceptBarcode('barcode');
            });

            (function($){
                $.fn.acceptBarcode = function(barcodeClass){
                    var canSubmit = false;

                    this.submit(function(e){
                        //e.preventDefault();
                        return canSubmit;
                    });

                    this.find('input.' + barcodeClass).each(function(){
                        console.log('accept barcode for ' + $(this).attr('name'))

                        $(this).bind('keyup', function(e){
                            var code = (e.keyCode? e.keyCode : e.which);
                            if(code == 13){ // Enter key pressed.
                                canSubmit = false;
                                console.log('serial enter detected - disable form.submit()');
                            }
                        })

                        $(this).bind('focus', function(){
                            canSubmit = false;
                            console.log('serial input focus - disable form.submit()');
                        })

                        $(this).bind('blur', function(){
                            canSubmit = true;
                            console.log('serial input blur - enable form.submit()');
                        });
                    });
                };
            })(jQuery);




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

            $('.show').hide();
            $('.select_cat').on('change',function(){
                var id = $(this).val();
                var text = $('.text').val()
                $.ajax({
                    url : "/select_unit_tran",
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        $('.show').show();
                        //console.log(e);
                        $('.cat_tran').html('');
                        $('.cat_tran').append("<option value=''>"+text+"</option>");
                        $.each($.parseJSON(e),function(i,val){
                            $('.cat_tran').append("<option value='"+val.id+"'>"+val.name_th+" "+val.name_en+"</option>");
                        });
                    },error : function(){
                        console.log('aa');
                    }
                })
            })

        });
    </script>
@endsection