@extends('home.home_user')
@section('content')
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.store.title') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="panel-body" id="landing-subject-list">
                            {!! Form::model($order,array('url' => array('/employee/update/order_company'),'class'=>'form-horizontal form_add create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                            <div class="form-group row">
                                <input type="hidden" name="id_order" value="{!! $order->id !!}" class="id_order">
                                <label class="col-sm-2 control-label">{{ trans('messages.store.title') }}</label>
                                <div class="col-sm-10">
                                    <input type="hidden" value="{!! $order->join_company->province !!}" class="id_pro">
                                    <input type="hidden" value="{!! $order->join_company->districts !!}" class="districts">
                                    <input type="hidden" value="{!! $order->join_company->subdistricts !!}" class="subdistricts">
                                    {!! Form::select('company_id',$store,null,array('class'=>'form-control company','readonly','disabled')) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <lable class="col-sm-2 control-label">{!! trans('messages.unit.name') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::text('name',$order->join_company['name_'.Session::get('locale')],array('class'=>'form-control name','placeholder'=>trans('messages.unit.name'),'readonly')) !!}
                                </div>

                                <lable class="col-sm-2 control-label">{!! trans('messages.store.tell') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::text('tell',$order->join_company->tell,array('class'=>'form-control tell','placeholder'=>trans('messages.store.tell'),'readonly')) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <lable class="col-sm-2 control-label">{!! trans('messages.store.tax') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::text('tax_id',$order->join_company->tax_id,array('class'=>'form-control tax_id','placeholder'=>trans('messages.store.tax'),'readonly')) !!}
                                </div>

                                <lable class="col-sm-2 control-label">{!! trans('messages.store.mail') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::text('email',$order->join_company->email,array('class'=>'form-control email','placeholder'=>trans('messages.store.mail'),'readonly')) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <lable class="col-sm-2 control-label">{!! trans('messages.profile.province') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::text('province_id',$order->join_company->join_province['name_in_'.Session::get('locale')],array('class'=>'form-control province_id','placeholder'=>trans('messages.profile.province'),'readonly')) !!}
                                </div>

                                <lable class="col-sm-2 control-label">{!! trans('messages.profile.district') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::text('dis_id',$order->join_company->join_Districts['name_'.Session::get('locale')],array('class'=>'form-control dis_id','placeholder'=>trans('messages.profile.district'),'readonly')) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <lable class="col-sm-2 control-label">{!! trans('messages.profile.sub') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::text('sub_id',$order->join_company->join_Subdistricts['name_'.Session::get('locale')],array('class'=>'form-control sub_id','placeholder'=>trans('messages.profile.sub'),'readonly')) !!}
                                </div>

                                <lable class="col-sm-2 control-label">{!! trans('messages.profile.post') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::text('post_code',$order->join_company->post_code,array('class'=>'form-control post_code','placeholder'=>trans('messages.profile.post'),'readonly')) !!}
                                    <input type="hidden" class="id">
                                    {{--<input type="text" required>--}}
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="panel-heading">
                                    <h3 class="panel-title">{!! trans('messages.order.order') !!}</h3>
                                </div>
                                <div class="panel panel-default" id="panel-lead-list">
                                    <div class="panel-body" id="landing-subject-list">
                                        <table class="table itemTables" style="width: 100%">
                                            <tr>
                                                <th width="20%"><button class="btn btn-primary mt-2 mt-xl-0 text-right add-store" type="button"><i class="fa fa-plus-circle"></i>  {!! trans('messages.order.title') !!}</button></th>
                                                <th>{!! trans('messages.product.head_product') !!}</th>
                                                <th>{!! trans('messages.product.amount') !!}</th>
                                                <th>{!! trans('messages.unit.title') !!}</th>
                                                <th>{!! trans('messages.action') !!}</th>
                                            </tr>
                                            @foreach($order_ as $key => $t)
                                                <tr>
                                                    <td><input type="hidden" class="form-control" name="data_[{!! $key !!}][id]" value="{!! $t['id'] !!}"></td>
                                                    {{--<td><input type="text" class="form-control" name="data_[{!! $key !!}][amount]" value="{!! $t->amount !!}"></td>--}}
                                                    @if($t['name'] != null)
                                                        <td><input type="text" class="form-control" name="data_[{!! $key !!}][product_name]" value="{!! $t['name'] !!}"></td>
                                                        <td><input type="text" class="form-control num" name="data_[{!! $key !!}][amount]" value="{!! $t['amount'] !!}"></td>
                                                        <td><input type="text" class="form-control" name="data_[{!! $key !!}][unit_name]" value="{!! $t['unit_name'] !!}"></td>
                                                    @else
                                                     <td>
                                                         <select name="data_[{!! $key !!}][product_id]" id="" class="form-control">
                                                             @foreach($stock as $key_ => $v)
                                                                 <option value="{!! $t->product_id !!}" @if($t->product_id == $v->id) selected @endif>{!! $v{'name_'.Session::get('locale')} !!}</option>
                                                             @endforeach
                                                         </select>
                                                     </td>
                                                        <td><input type="text" class="form-control num" name="data_[{!! $key !!}][amount]" value="{!! $t->amount !!}"></td>
                                                        <td>
                                                            <select name="data_[{!! $key !!}][unit]" id="" class="form-control">
                                                                <option value="{!! $t->join_stock->join_stock_log['id'] !!}" @if($t->join_stock->join_stock_log['id'] == $t['unit']) selected @endif>{!! $t->join_stock->join_stock_log{'name_'.Session::get('locale')} !!}</option>
                                                                {{--{!! dd($t->join_stock->join_unit_transection) !!}--}}
                                                                @foreach($t->join_stock->join_unit_transection as $k => $v)
                                                                    <option value="{!! $v->id !!}" @if($t->unit == $v->id) selected @endif>{!! $v{'name_'.Session::get('locale')} !!}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    @endif

                                                    {{--<td><input type="text" class="form-control" name="data_[{!! $key !!}][amount]" value="{!! $t->amount !!}"></td>--}}

                                                    {{--@if(!empty($t['unit_name']))--}}
                                                        {{--<td><input type="text" class="form-control" name="data_[{!! $key !!}][unit_name]" value="{!! $t['unit_name'] !!}"></td>--}}
                                                    {{--@else--}}
                                                        {{--<td>--}}
                                                            {{--<select name="data_[{!! $key !!}][product_id]" id="" class="form-control">--}}
                                                                {{--<option value="{!! $t->join_stock->join_stock_log['id'] !!}" @if($t->join_stock->join_stock_log['id'] == $t['unit']) selected @endif>{!! $t->join_stock->join_stock_log{'name_'.Session::get('locale')} !!}</option>--}}
                                                                {{--{!! dd($t->join_stock->join_unit_transection) !!}--}}
                                                                {{--@foreach($t->join_stock->join_unit_transection as $key => $v)--}}
                                                                    {{--<option value="{!! $v->id !!}" @if($t->unit == $v->id) selected @endif>{!! $v{'name_'.Session::get('locale')} !!}</option>--}}
                                                                {{--@endforeach--}}
                                                            {{--</select>--}}
                                                        {{--</td>--}}
                                                    {{--@endif--}}
                                                    <td><a class="btn btn-danger delete-order" data-id="{!! $t['id'] !!}"><i class="mdi mdi-delete-sweep"></i></a></td>
                                                </tr>
                                            @endforeach
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
                <div class="card-body float-right">
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="panel-body float-right" id="landing-subject-list">
                            <button class="btn-info btn-primary add-store-btn" id="add-store-btn" type="submit">Save</button>
                            <button class="btn-info btn-warning" type="reset">Reset</button>
                            {!! Form::close() !!}
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

    <script type="text/javascript">
        $('.product_select').hide();

        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.add-store').on('click',function(){
                $('#add-store').modal('show');
            });


            $('.search-store').on('click',function(){
                var data  = $('#search-form').serialize();
                //alert('aa');
                console.log(data);
                $('#landing-subject-list').css('opacity','0.6');
                $.ajax({
                    url : '/employee/create/order_bill',
                    method : 'post',
                    dataType : 'html',
                    data : data,
                    success : function(e){
                        $('#landing-subject-list').css('opacity','1').html(e);
                    } ,error : function(){
                        console.log('Error Search Data Store');
                    }
                });
            });

            $('.reset-s-btn').on('click',function () {
                $(this).closest('form').find("input").val("");
                $(this).closest('form').find("select option:selected").removeAttr('selected');
                //propertyPageSale (1);
                window.location.href ='/employee/create/order_bill';
            });

            $('body').on('click', '.add-store',function(){
                var id = $('.id').val();
                var time = $.now();
                //$('.product_select').hide();
                $(this).parents('tr').find('.product_select').hide();

                //console.log(amount);

                var data = ['<tr class="itemRow">',
                    '<td><button class="btn btn-success mt-2 mt-xl-0 text-right search_product" type="button"><i class="fa fa-search"></i></button></td>',
                    '<td><select class="product_select form-control" name=data['+time+'][product_id] style="display: none;" required></select><input type="text" class="form-control product_text" name="data['+time+'][product]" required></td>',
                    '<td><input type="text" class="form-control num" name="data['+time+'][amount]" required></td>',
                    '<td><select class="unit_select form-control" name=data['+time+'][unit_id] style="display: none;" required></select><input type="text" class="form-control unit_text" name="data['+time+'][unit_name]" required></td>',
                    '<td><a class="btn btn-danger delete-subject"><i class="mdi mdi-delete-sweep"></i></a></td>',
                ];

                data.push(
                    '<td><div class="text-right">' +
                    '<span class="colTotal"></span> </div><input class="tLineTotal" name="" type="hidden" value=""></td>', '</tr>');
                data = data.join('');

                $('.itemTables').append(data);
                //calTotal();
            });

            $('body').on('click','.search_product',function(){
                var id = $('.id_order').val();
                var this_ = $(this);
                // console.log(id);
                $.ajax({
                    url: '/customer/search/product',
                    method:'POST',
                    dataType:'JSON',
                    data : ({'id':id}),
                    success : function(e){
                        this_.parents('tr').find('.product_select').show();
                        this_.parents('tr').find('.product_text').hide();
                        //console.log(e);
                        this_.parents('tr').find('.product_select').append("<option value=''>{!! trans('messages.product.head_product') !!}</option>");
                        $.each(e,function(i,val){
                            this_.parents('tr').find('.product_select').append("<option value='"+val.id+"'>"+val.name_th+" "+val.name_en+"</option>");
                            //$('.postcode').val(val.zip_code);
                        });
                    },error : function(){
                        console.log('Error Search Product To Cart');
                    }
                })
            });

            $('.cat_id').hide();
            $('body').on('change','.company',function(){
                var data  = $(this).val();
                $.ajax({
                    url: '/customer/search/company',
                    method:'POST',
                    dataType:'JSON',
                    data : ({'id':data}),
                    success : function(e){
                        $('.show').show();
                        console.log(e);
                        $('.name').val(e.name{!! '_'.Session::get('locale') !!});
                        $('.tell').val(e.tell);
                        $('.tax_id').val(e.tax_id);
                        $('.email').val(e.email);
                        $('.id').val(e.id);

                        // $('.dis_id').val(e.districts);
                        // $('.sub_id').val(e.subdistricts);
                        $('.post_code').val(e.post_code);

                        selectProvince(e.province);
                        selectDis(e.districts);
                        selectSubdis(e.subdistricts)
                    },error : function(){
                        console.log('Error Search Product To Cart');
                    }
                })
            });

            $('body').on('change','.product_select',function(){
                var id = $(this).val();
                var this_ = $(this);
                console.log(id);
                $.ajax({
                    url: '/customer/search/unit',
                    method:'POST',
                    dataType:'JSON',
                    data : ({'id':id}),
                    success : function(e){
                        console.log(e);
                        this_.parents('tr').find('.unit_select').show();
                        this_.parents('tr').find('.unit_text').hide();
                        //console.log(e);
                        this_.parents('tr').find('.unit_select').append("<option value=''>{!! trans('messages.product.head_product') !!}</option>");
                        this_.parents('tr').find('.unit_select').append("<option value='"+e.unit.id+"'>"+e.unit.name_th+" "+e.unit.name_en+"</option>");
                        $.each(e.unit_,function(i,val){
                            this_.parents('tr').find('.unit_select').append("<option value='"+val.id+"'>"+val.name_th+" "+val.name_en+"</option>");
                            //$('.postcode').val(val.zip_code);
                        });
                    },error : function(){
                        console.log('Error Search Product To Cart');
                    }
                })
            })

            $('.itemTables').on('click','.amount',function(){
                var amount = $(this).parents('tr').find('.amount').val();
                var price = $(this).parents('tr').find('.price').val();

                var sum_price = 0;
                sum_price = price * amount;

                $(this).parents('tr').find('.tLineTotal').val(sum_price.toFixed(2));
                $(this).parents('tr').find('.total').val(sum_price.toFixed(2));

                //console.log(price*amount);
                calTotal()
            });

            $('.itemTables').on("click", '.delete-subject', function() {
                //alert('aaa');
                $(this).closest('tr.itemRow').remove();
                //return false;
                calTotal();
            });
            function calTotal(){
                var Total = 0;
                var discount = $('.discount').val();
                var money = $('.money').val();

                var total_net = 0 ;
                var total_money = 0;

                $('.tLineTotal').each(function () {
                    if ( $(this).val() !== "" ) {
                        t = Number($(this).val());
                        Total += t;

                        total_net = Math.abs(discount-Total);
                        total_money = Math.abs(money-total_net);

                        //var _Total = $.number(Total,2);
                        $('.sum_total').val(Total.toFixed(2));
                        $('.net').val(total_net.toFixed(2));

                        if(money != 0 && money >= total_net){
                            $('.withdrawal').val(total_money.toFixed(2));
                        }else{
                            $('.withdrawal').val("");
                        }



                    }
                });
            }

            // $('body').on('click','.add-store-btn',function () {
            //     if($('.create-store-form').valid()) {
            //         $(this).attr('disabled','disabled').prepend('<i class="fa-spin fa-spinner" style="color: red;"></i> ');
            //         $('.create-store-form').submit();
            //     }
            // });

            $('.add-store-btn').on('click', function () {
                if($("#form_add").valid()) {
                    $(this).attr('disabled','disabled').prepend('<i class="fa-spin fa-spinner"></i> ');
                    $("#form_add").submit();
                }
            });

            function selectProvince(id){
                $.ajax({
                    url : "/company/select_province",
                    method : 'post',
                    dataType : 'JSON',
                    data : ({'id':id}),
                    success : function(e){
                        //console.log(e);
                        $('.province_id').val(e.name_in{!! '_'.Session::get('locale') !!});
                    },error : function(){
                        console.log('aa');
                    }
                })
            }

            function selectDis(id){
                $.ajax({
                    url : "/company/select_dis",
                    method : 'post',
                    dataType : 'JSON',
                    data : ({'id':id}),
                    success : function(e){
                        //console.log(e.name{!! '_'.Session::get('locale') !!});
                        $('.dis_id').val(e.name{!! '_'.Session::get('locale') !!});
                    },error : function(){
                        console.log('aa');
                    }
                })
            }

            function selectSubdis(id){
                $.ajax({
                    url : "/company/select_Subdis",
                    method : 'post',
                    dataType : 'JSON',
                    data : ({'id':id}),
                    success : function(e){
                        console.log(e.name{!! '_'.Session::get('locale') !!});
                        $('.sub_id').val(e.name{!! '_'.Session::get('locale') !!});
                    },error : function(){
                        console.log('aa');
                    }
                })
            }

            $("body").on("keypress",'.num' , function (e) {

                var code = e.keyCode ? e.keyCode : e.which;

                if(code > 57){
                    return false;
                }else if(code < 48 && code != 8){
                    return false;
                }

            });

            $('body').on('click','.delete-order',function(){
                var id = $(this).data('id');
                var id_order = $('.id_order').val();
                 //console.log(id_order);
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete)=> {
                    if (willDelete) {
                        setTimeout(function() {
                            $.post("/employee/order_company/delete", {
                                id: id
                            }, function(e) {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                }).then(function(){
                                    window.location.href ='/employee/edit/order_company/'+id_order
                                });
                            });
                        }, 50);
                    } else {
                        swal("Your imaginary file is safe!");
            }
            });
            });

        });
    </script>
@endsection