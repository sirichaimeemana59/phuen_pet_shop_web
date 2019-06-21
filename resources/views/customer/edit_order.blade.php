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
                            {!! Form::model(null,array('url' => array('/customer/add/order'),'class'=>'form-horizontal form_add','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
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
                                @foreach($order_tran as $t)
                                    <tr>
                                        <td></td>
                                        <td>{!! $t->join_stock{'name_'.Session::get('locale')} !!}</td>
                                        <td style="text-align: right;">{!! $t->price_product !!}</td>
                                        <td>@if(!empty($t->join_stock_log)){!! $t->join_stock_log{'name_'.Session::get('locale')} !!} @else {!! $t->join_unit_transection_all{'name_'.Session::get('locale')} !!} @endif</td>
                                        <td style="text-align: right;">{!! $t->amount !!}</td>
                                        <td style="text-align: right;">{!! $t->total_price !!}</td>
                                    </tr>
                                    <?php $sum += $t->total_price;?>
                                @endforeach

                            </table>
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

    <br>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body float-right">
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="panel-body float-right" id="landing-subject-list">
                            <button class="btn-info btn-primary" id="add-store-btn" type="submit">Save</button>
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
                    url : '/customer/edit/order/'+id_order,
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
                window.location.href ='/customer/order';
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
                    '<td><input type="hidden" name="data['+time+'][product_id]" value="'+product+'"><span>'+name+'</span></td>',
                    '<td><input type="text" class="form-control price" name="data['+time+'][price]" readonly value="'+price+'"></td>',
                    '<td><input type="hidden" name="data['+time+'][unit_id]" value="'+unit_id+'"><span>'+unit+'</span></td>',
                    '<td><input type="number" class="form-control amount" name="data['+time+'][amount]" min="1" max="'+amount+'"></td>',
                    '<td><input type="text" class="form-control total" name="data['+time+'][total]" readonly></td>',
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
                    url: '/customer/search/group',
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
                var Total = parseInt($('.hide_total').val());;
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
        });
    </script>
@endsection