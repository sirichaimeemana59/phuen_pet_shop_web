@extends('home.home_user')
@section('content')
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.group.title') !!}</h3>
                    </div>
                    <div class="panel-body search-form">
                        <form method="POST" id="search-form" action="#" accept-charset="UTF-8" class="form-horizontal">
                            <div class="row">
                                <lable class="col-sm-2 control-label">{!! trans('messages.group.title') !!}</lable>
                                <div class="col-sm-4">
                                    <input type="hidden" name="id_order" class="id_order" value="{!! $order_customer->id !!}">
                                    <select name="group_id" id="" style="width: 100%;" class="group_id">
                                        <option value="">{!! trans('messages.selete_group') !!}</option>
                                        @foreach($cat as $key => $row)
                                            <option value="{!! $row->id !!}">{!! $row{'name_'.Session::get('locale')} !!}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <lable class="col-sm-2 control-label">{!! trans('messages.category.title') !!}</lable>
                                <div class="col-sm-4">
                                    <input type="hidden" class="text" value="{!! trans('messages.selete_cat') !!}">
                                    <select name="cat_id" id="" style="width: 100%;" class="cat_id">
                                        <option value="">{!! trans('messages.selete_cat') !!}</option>
                                    </select>
                                </div>
                            </div>
                            <br>

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
                        <h3 class="panel-title">{!! trans('messages.product.head_product') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="panel-body" id="landing-subject-list">
                            @include('customer.list_order_element')
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
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.order.title') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="panel-body" id="landing-subject-list">
                            {!! Form::model(null,array('url' => array('/customer/update/order'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                            <input type="hidden" name="id_order" value="{!! $order_customer->id !!}">
                            <div class="table-responsive table-striped">
                            <table class="table itemTables" style="width: 100%">
                                <tr>
                                    <th ></th>
                                    <th>{!! trans('messages.product.head_product') !!}</th>
                                    <th>{!! trans('messages.product.price') !!}</th>
                                    <th>{!! trans('messages.unit.title') !!}</th>
                                    {{--<th>{!! trans('messages.product.amount') !!}</th>--}}
                                    <th>{!! trans('messages.product.amount') !!}</th>
                                    <th>{!! trans('messages.product.total') !!}</th>
                                    <th>{!! trans('messages.action') !!}</th>
                                </tr>
                                <?php $sum = 0;?>
                                @foreach($order_tran as $key => $t)
                                    <tr>
                                        <td><input type="hidden" name="data_[{!! $key !!}][id_order]" value="{!! $t->id !!}">
                                            <input type="hidden" name="data_[{!! $key !!}][id]" value="{!! $t->join_product['id'] !!}">
                                            <input type="hidden" name="data_[{!! $key !!}][product_id]" value="{!! $t->product_id !!}">
                                            <input type="hidden" name="data_[{!! $key !!}][unit_sale]" value="{!! $t->unit_sale !!}"></td>
                                        <td>{!! $t->join_stock{'name_'.Session::get('locale')} !!}</td>
                                        <td style="text-align: right;"><input type="text" class="form-control price" name="data_[{!! $key !!}][price]"  readonly value="{!! $t->price_product !!}" required></td>
                                        <td>@if(!empty($t->join_stock_log)){!! $t->join_stock_log{'name_'.Session::get('locale')} !!} @else {!! $t->join_unit_transection_all{'name_'.Session::get('locale')} !!} @endif</td>
                                        <td style="text-align: right;"><input type="number" name="data_[{!! $key !!}][amount]" class="form-control amount" value="{!! $t->amount !!}" min="1" max="{!! $t->join_widen_trans['amount_widden'] !!}"></td>
                                        <td style="text-align: right;"><input class="tLineTotal" name="" type="hidden" value="{!! $t->total_price !!}"><input type="text" name="data_[{!! $key !!}][total]" class="form-control total" value="{!! $t->total_price !!}" readonly></td>
                                        <td><a class="btn btn-danger delete-order" data-id="{!! $t->id !!}" data-order="{!! $order_customer->id !!}"><i class="mdi mdi-delete-sweep"></i></a></td>
                                    </tr>
                                    <?php $sum += $t->total_price;?>
                                @endforeach

                            </table>
                            </div>
                            <input type="hidden" class="hide_total" value="{!! $sum !!}">

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
                        <div class="panel-body float-right" id="landing-subject-list">
                            <lable class="col-sm-10 control-label">{!! trans('messages.sell.total') !!}</lable>
                            <div class="col-sm-12">
                                <input type="text" class="form-control sum_total" readonly name="sum_total" value="{!! $sum !!}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Address--}}
    <br>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body float-right">
                    <div class="panel panel-default" id="panel-lead-list">
                        {{--@if(!empty($profile))--}}
                        {{--{!! Form::model($profile,array('url' => array('user/update_profile'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}--}}
                        @if(!empty($profile))
                            <input type="hidden" name="id" value="{!! $profile->id !!}">
                            <input type="hidden" name="photo_" value="{!! $profile->photo !!}">
                            <input type="hidden" class="property_id" value="{!! $profile->id !!}">
                            <input type="hidden" class="dis" name="dis" value="{!! $profile->dis_id !!}">
                            <input type="hidden" class="subdis" name="subdis" value="{!! $profile->sub_id !!}">
                            <input type="hidden" class="pro" name="pro" value="{!! $profile->province_id !!}">
                        @endif
                        {{--@else--}}
                        {{--{!! Form::model(null,array('url' => array('user/add_profile'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}--}}
                        {{--@endif--}}
                        <div class="form-group row">
                            <lable class="col-sm-2 control-label">{!! trans('messages.profile.name') !!}</lable>
                            <div class="col-sm-4">
                                @if(!empty($profile->name))
                                    {!! Form::text('name',$profile['name'],array('class'=>'form-control','placeholder'=>trans('messages.profile.name'),'required')) !!}
                                @else
                                    {!! Form::text('name',null,array('class'=>'form-control','placeholder'=>trans('messages.profile.name'),'required')) !!}
                                @endif
                            </div>

                            <lable class="col-sm-2 control-label">{!! trans('messages.profile.tell') !!}</lable>
                            <div class="col-sm-4">
                                @if(!empty($profile->tell))
                                    {!! Form::text('tell',$profile->tell,array('class'=>'form-control','placeholder'=>trans('messages.profile.tell'))) !!}
                                @else
                                    {!! Form::text('tell',null,array('class'=>'form-control','placeholder'=>trans('messages.profile.tell'))) !!}
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <lable class="col-sm-2 control-label">{!! trans('messages.profile.address') !!}</lable>
                            <div class="col-sm-10">
                                @if(!empty($profile->address))
                                    {!! Form::text('address',$profile->address,array('class'=>'form-control','placeholder'=>trans('messages.profile.address'))) !!}
                                @else
                                    {!! Form::text('address',null,array('class'=>'form-control','placeholder'=>trans('messages.profile.address'))) !!}
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 control-label">{{ trans('messages.AboutProp.province') }}</label>
                            <div class="col-sm-4">
                                @if(!empty($profile->province_id))
                                    {!! Form::select('province',$provinces,$profile->province_id,array('class'=>'form-control province')) !!}
                                @else
                                    {!! Form::select('province',$provinces,null,array('class'=>'form-control province')) !!}
                                @endif
                            </div>

                            <label class="col-sm-2 control-label">{{ trans('messages.AboutProp.district') }}</label>
                            <div class="col-sm-4">
                                @if(!empty($profile->distric_id))
                                    {!! Form::select('district',$districts,$profile->dis_id,array('class'=>'form-control district')) !!}
                                @else
                                    {!! Form::select('district',$districts,null,array('class'=>'form-control district')) !!}
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 control-label">{{ trans('messages.AboutProp.subdistricts') }}</label>
                            <div class="col-sm-4">
                                {!! Form::select('sub_district',$subdistricts,null,array('class'=>'form-control subdistricts')) !!}
                            </div>

                            <label class="col-sm-2 control-label">{{ trans('messages.AboutProp.postcode') }}</label>
                            <div class="col-sm-4">
                                {!! Form::text('post_code',null,array('class'=>'form-control postcode','maxlength' => 10, 'placeholder'=> trans('messages.AboutProp.postcode'))) !!}
                                {!! Form::hidden('post_code1',null,array('class'=>'form-control','maxlength' => 10, 'placeholder'=> trans('messages.AboutProp.postcode'))) !!}

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">{{ trans('messages.driver.driver') }}</label>
                            <div class="col-sm-4">
                                @if(!empty($order_customer->driver))
                                    {!! Form::select('driver',$drivers,$order_customer->driver,array('class'=>'form-control driver','required')) !!}
                                @else
                                    {!! Form::select('driver',$drivers,null,array('class'=>'form-control driver','required')) !!}
                                @endif
                            </div>
                            <input type="hidden" class="id_drive" value="{!! $order_customer->driver !!}">

                            <label class="col-sm-2 control-label">{{ trans('messages.product.price') }}</label>
                            <div class="col-sm-4">
                                {!! Form::text('price',null,array('class'=>'form-control num price_driver','maxlength' => 10, 'placeholder'=> trans('messages.product.price'),'readonly')) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row show_submit">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body text-right">
                    <div class="panel panel-default" id="panel-lead-list">
                        <button class="btn-info btn-primary" id="add-store-btn" type="submit">{{ trans('messages.save') }}</button>
                        <button class="btn-info btn-warning" type="reset">{{ trans('messages.reset') }}</button>                    </div>
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

            $('.add-store').on('click',function(){
                $('#add-store').modal('show');
            });

            $('.search-store').on('click',function(){
                var data  = $('#search-form').serialize();
                var id_order  = $('.id_order').val();
                //alert('aa');
                console.log(id_order);
                $('#landing-subject-list').css('opacity','0.6');
                $.ajax({
                    url : $('#root-url').val()+'/customer/edit/order/'+id_order,
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
                window.location.href =$('#root-url').val()+'/customer/order';
            });

            $('body').on('click', '.add-product',function(){
                var id = $(this).data('id');
                var product = $(this).data('product');
                var name = $(this).data('name');
                var amount = $(this).data('amount');
                var price = $(this).data('price');
                var unit_id = $(this).data('unit_id');
                var unit = $(this).data('unit');

                var time = $.now();

                //console.log(amount);

                var data = ['<tr class="itemRow">',
                    '<td></td>',
                    '<td><input type="hidden" name="data['+time+'][id]" value="'+id+'" required=""><input type="hidden" name="data['+time+'][product_id]" value="'+product+'" required=""><span>'+name+'</span></td>',
                    '<td><input type="text" class="form-control price" name="data['+time+'][price]" readonly value="'+price+'" required=""></td>',
                    '<td><input type="hidden" name="data['+time+'][unit_id]" value="'+unit_id+'" required=""><span>'+unit+'</span></td>',
                    '<td><input type="number" class="form-control amount" name="data['+time+'][amount]" min="1" max="'+amount+'" required=""></td>',
                    '<td><input type="text" class="form-control total" name="data['+time+'][total]" readonly required=""></td>',
                    '<td><a class="btn btn-danger delete-subject"><i class="mdi mdi-delete-sweep"></i></a></td>',
                ];

                data.push(
                    '<td><div class="text-right">' +
                    '<span class="colTotal"></span> </div><input class="tLineTotal" name="" type="hidden" value=""></td>', '</tr>');
                data = data.join('');

                $('.itemTables').append(data);
                calTotal();

                // $.ajax({
                //     url: '/customer/search/product',
                //     method:'POST',
                //     dataType:'JSON',
                //     data : ({'id':id}),
                //     success : function(e){
                //         console.log(e.unit_tran);
                //     },error : function(){
                //         console.log('Error Search Product To Cart');
                //     }
                // })
            });

            $('.cat_id').hide();
            $('body').on('change','.group_id',function(){
                var data  = $(this).val();
                var text = $('.text').val();
                //console.log(data);
                $.ajax({
                    url: $('#root-url').val()+'/customer/search/group',
                    method:'POST',
                    dataType:'JSON',
                    data : ({'id':data}),
                    success : function(e){
                        $('.cat_id').show();
                        $(".cat_id").html('');
                        $(".cat_id").append("<option value=''>"+text+"</option>");
                        $.each(e, function(i, val){
                            $(".cat_id").append("<option value='"+val.id+"'>"+val.name_th+" "+val.name_en+"</option>");
                        });
                    },error : function(){
                        console.log('Error Search Product To Cart');
                    }
                })
            });

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
                //var Total = parseInt($('.hide_total').val());
                var Total = 0;
                var Total_ = 0;
                var discount = $('.discount').val();
                var money = $('.money').val();

                var total_net = 0 ;
                var total_money = 0;

                //var sum_total = $.number(Total);

                //console.log(Total);
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

            $('#add-store-btn').on('click',function () {
                if($('.create-store-form').valid()) {
                    $(this).attr('disabled','disabled').prepend('<i class="fa-spin fa-spinner" style="color: red;"></i> ');
                    $('.create-store-form').submit();
                }
            });

            @if(!empty($profile))
            $('.subdistricts').attr("disabled", false);
            $('.district').attr("disabled", false);
            @else
            $('.subdistricts').attr("disabled", true);
            $('.district').attr("disabled", true);
            @endif


            $('.province').on('change',function(){
                $('.district').attr("disabled", false);
                var id;
                id = $(this).val();
                $.ajax({
                    url : $('#root-url').val()+"/address/select/district/address",
                    method : 'post',
                    dataType: 'html',
                    data : ({'id':id}),
                    success: function (e) {
                        $(".district").html('');
                        $(".district").append("<option value=''>อำเภอ/เขต</option>");
                        $.each($.parseJSON(e), function(i, val){
                            $(".district").append("<option value='"+val.id+"'>"+val.name_th+" "+val.name_en+"</option>");
                        });
                    },
                    error : function () {


                    }
                })
            })

            function SelectDistrict(id){
                $('.subdistricts').attr("disabled", false);
                var id = id;
                //console.log(id);
                $.ajax({
                    url : $('#root-url').val()+"/root/admin/select/subdistrict/address",
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        $('.subdistricts').html('');
                        $.each($.parseJSON(e),function(i,val){
                            $('.subdistricts').append("<option value='"+val.id+"'>"+val.name_th+" "+val.name_en+"</option>");
                            $('.postcode').val(val.zip_code);
                        });

                    },error : function(){

                    }
                })
            }

            $('body').ready(function(){
                var id = $('.property_id').val();
                var dis = $('.dis').val();
                var subdis = $('.subdis').val();
                var id_drive = $('.id_drive').val();
                var select;
                //console.log(dis);
                $.ajax({
                    url : $('#root-url').val()+"/address/select/district/edit/address",
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        console.log(e);
                        $('.district').html('');
                        $('.district').append("<option value=''>อำเภอ</option>");
                        $.each($.parseJSON(e),function(i,val){
                            if(val.id == dis){
                                select = "selected";
                                $('.district').append("<option value='"+val.id+"' selected='"+select+"'>"+val.name_th+" "+val.name_en+"</option>");
                            }else {
                                select = "";
                                $('.district').append("<option value='"+val.id+"'>"+val.name_th+" "+val.name_en+"</option>");
                            }
                            //console.log(select);
                            //$('.postcode').val(val.zip_code);
                            //console.log(val.id);
                        });
                    },error : function(){
                        console.log('aa');
                    }
                })
                ////////////////////////////////
                $.ajax({
                    url : $('#root-url').val()+"/customer/select/editSubDis/address",
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        $('.subdistricts').html('');
                        $('.subdistricts').append("<option value=''>ตำบล</option>");
                        $.each($.parseJSON(e),function(i,val){
                            if(val.id == subdis){
                                select = "selected";
                                $('.subdistricts').append("<option value='"+val.id+"' selected='"+select+"'>"+val.name_th+" "+val.name_en+"</option>");
                            }else {
                                select = "";
                                $('.subdistricts').append("<option value='"+val.id+"'>"+val.name_th+" "+val.name_en+"</option>");
                            }
                            $('.postcode').val(val.zip_code);
                        });
                    },error : function(){
                        console.log('aa');
                    }
                })
                /////////////////////////////////////
                $.ajax({
                    url :$('#root-url').val()+"/customer/select/drive_price",
                    method : 'post',
                    dataType : 'json',
                    data : ({'id':id_drive}),
                    success : function(e){
                        //console.log(e);
                        $('.price_driver').val(e.price);
                    },error : function(){
                        console.log('aa');
                    }
                })
            });

            $('.district').on('change',function(){
                $('.subdistricts').attr("disabled", false);
                var id = $(this).val();
                console.log(id);
                $.ajax({
                    url : $('#root-url').val()+"/customer/select/subdistrict/address",
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        //console.log(e);
                        $('.subdistricts').html('');
                        $('.subdistricts').append("<option value=''>ตำบล</option>");
                        $.each($.parseJSON(e),function(i,val){
                            $('.subdistricts').append("<option value='"+val.id+"'>"+val.name_th+" "+val.name_en+"</option>");
                            $('.postcode').val(val.zip_code);
                        });
                    },error : function(){
                        console.log('aa');
                    }
                })
            });

            $('.subdistricts').on('change',function(){
                var id = $(this).val();
                //console.log(id);
                $.ajax({
                    url : $('#root-url').val()+"/customer/select/zip_code/address",
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        $.each($.parseJSON(e),function(i,val){
                            $('.postcode').val(val.zip_code);
                        });
                        //console.log(e);

                    },error : function(){
                        //console.log('aa');
                    }
                })
            });

            $('body').on('click','.delete-order',function(){
                var id = $(this).data('id');
                var order = $(this).data('order');
                swal({
                    title: "Are you sure?",
                    text: "You want to confirm this order.",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete)=> {
                    if (willDelete) {
                        setTimeout(function() {
                            $.post($('#root-url').val()+"/employee/delete_order", {
                                id: id
                            }, function(e) {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                }).then(function(){
                                    window.location.href =$('#root-url').val()+'/employee/edit/order/'+order
                                });
                            });
                        }, 50);
                    } else {
                        swal("Your imaginary file is safe!");
            }
            });
            });

            $('.driver').on('change',function(){
                var id = $(this).val();
                //console.log(id);
                $.ajax({
                    url : $('#root-url').val()+"/customer/select/drive_price",
                    method : 'post',
                    dataType : 'json',
                    data : ({'id':id}),
                    success : function(e){
                        $('.price_driver').val(e.price);
                        //console.log(e);

                    },error : function(){
                        //console.log('aa');
                    }
                })
            });
        });
    </script>
@endsection
