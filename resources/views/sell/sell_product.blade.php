@extends('home.home_user')
@section('content')
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="text-align: center;">{!! trans('messages.sell.sale') !!}</h3>
                    </div>
                    <div class="panel-body search-form">
                        <form method="POST" id="search-form" action="" accept-charset="UTF-8" class="form-horizontal">
                            <div class="row">
                                <div class="col-sm-12 block-input">
                                    <input class="form-control barcode" size="25" placeholder="{!! trans('messages.sell.code') !!}" name="name" required autocomplete = "off">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    {{--<button type="reset" class="btn btn-white reset-s-btn">{!! trans('messages.reset') !!}</button>--}}
                                    <button type="button" class="btn btn-secondary search-store">{!! trans('messages.search') !!}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-8 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="text-align: center;">{!! trans('messages.sell.order') !!}</h3>
                    </div>
                    <div class="panel-body search-form table-responsive">
                        {!! Form::model(null,array('url' => array('/employee/sell/product/add_order_product'),'class'=>'form-horizontal form_add','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data','target'=>'_bank')) !!}
                        <table class="table itemTables" style="width: 100%">
                            <tr>
                                <th ></th>
                                <th>{!! trans('messages.photo') !!}</th>
                                <th>{!! trans('messages.product.head_product') !!}</th>
                                <th>{!! trans('messages.product.amount') !!}</th>
                                <th>{!! trans('messages.product.price') !!}</th>
                                <th>{!! trans('messages.product.total') !!}</th>
                                <th>{!! trans('messages.action') !!}</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    {{--</div>--}}
    {{--<div class="clearfix"></div>--}}
    {{--<div class="row">--}}
        <div class="col-md-4 stretch-card">
            <div class="card">
            <div class="card-body table-responsive">
            <table class="table">
                <tr>
                    <th width="15%"></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr style="text-align: right;font-weight: bold;">
                    <td colspan="5" style="text-align: right;font-weight: bold;">{!! trans('messages.payment.title') !!}</td>
                    <td style="text-align: right;"><input type="text" class="total form-control" readonly name="total"> <input type="hidden" class="_total"></td>
                    <td style="text-align: left;">{!! trans('messages.payment.bath') !!}</td>
                </tr>
                <tr style="text-align: right;font-weight: bold;">
                    <td colspan="5" style="text-align: right;font-weight: bold;">{!! trans('messages.payment.discount') !!}</td>
                    <td style="text-align: right;"><input type="text" class="discount form-control"  placeholder="0.00" name="discount" autocomplete = "off"></td>
                    <td style="text-align: left;">{!! trans('messages.payment.bath') !!}</td>
                </tr>
                <tr style="text-align: right;font-weight: bold;">
                    <td colspan="5" style="text-align: right;font-weight: bold;">{!! trans('messages.payment.net') !!}</td>
                    <td style="text-align: right;"><input type="text" class="net form-control" readonly  placeholder="0.00" name="net"></td>
                    <td style="text-align: left;">{!! trans('messages.payment.bath') !!}</td>
                </tr>
                <tr style="text-align: right;font-weight: bold;">
                    <td colspan="5" style="text-align: right;font-weight: bold;">{!! trans('messages.payment.money') !!}</td>
                    <td style="text-align: right;"><input type="text" class="money form-control" required  placeholder="0.00" name="money" autocomplete = "off"></td>
                    <td style="text-align: left;">{!! trans('messages.payment.bath') !!}</td>
                </tr>
                <tr style="text-align: right;font-weight: bold;">
                    <td colspan="5">{!! trans('messages.payment.withdrawal') !!}</td>
                    <td style="text-align: right;"><input type="text" class="withdrawal form-control" readonly  placeholder="0.00"></td>
                    <td style="text-align: left;">{!! trans('messages.payment.bath') !!}</td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td style="text-align: right;"><button class="btn-info btn-primary btn-lg payment_" type="submit"><li class="fa fa-money"></li> {!! trans('messages.sell.payment') !!}</button></td>
                </tr>
            </table>
            {!! Form::close() !!}
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

            $(document).ready(function(){
                $('form').acceptBarcode('barcode');
            });


            $('.barcode').on('keyup',function(){
                var data = $('#search-form').serialize();
                //console.log(data);
                var this_ = $(this);
                this_.parents('tr').find('.id_product_').val("");

                var id = $('.id_product_').val();

                $.ajax({
                    url: '/employee/sell/search_product',
                    method: 'post',
                    dataType: 'JSON',
                    data: data,
                    success: function (e) {
                        $('.barcode').val("");
                        //console.log(e);
                        var name_en = e.join_stock.name_th;
                        var name_th = e.join_stock.name_en;
                        var price = e.price_piece;
                        var photo = e.join_stock.photo;
                        var id = e.id;
                        var time = $.now();

                        var total = price * 1;

                        if (lang = 'th') {
                            var name = name_th;
                        } else {
                            var name = name_en;
                        }

                        var data = ['<tr class="itemRow">',
                            '<td></td>',
                            '<td><img src="' + photo + '" alt="" width="25%"></td>',
                            '<td><span>' + name + '</span></td>',
                            '<td><input type="hidden" value="'+e.unit_sale+'" name="data['+time+'][unit_sale]"><input type="hidden" class="id_product_" value="'+e.product_id+'"><input type="number" class="price_total" name="data[' + time + '][amount]" min="1" max="100" value="1"></td>',
                            '<td><input type="hidden" name="data['+time+'][product_id]" value="'+id+'"><input type="hidden" name="data[' + time + '][price_unit]" class="price" value="' + price + '"><span>' + price + '</span></td>',
                            '<td><input type="text" class="result form-control" value="' + total + '" readonly name="data[' + time + '][total_price]"></td>',
                            '<td><a class="btn btn-danger delete-subject"><i class="mdi mdi-delete-sweep"></i></a></td>',
                        ];

                        data.push(
                            '<td><div class="text-right">' +
                            '<span class="colTotal"></span> </div><input class="tLineTotal" name="" type="hidden" value="' + total + '"></td>', '</tr>');
                        data = data.join('');

                        $('.itemTables').append(data);
                        calTotal();

                    }, error: function () {
                        //$('.barcode').val("");
                        //$('.barcode').val("");
                        console.log('Error Search Data Product');
                    }
                });
            });

            $('.show').hide();
            $('.search-store').on('click',function(){
                if($('#search-form').valid()) {
                    $('.show').show();
                    var data = $('#search-form').serialize();
                    var lang = '<?php echo Session::get('locale')?>';
                    //alert('aa');
                    //console.log(data);
                    $('#landing-subject-list').css('opacity', '0.6');
                    $.ajax({
                        url: '/employee/sell/search_product',
                        method: 'post',
                        dataType: 'JSON',
                        data: data,
                        success: function (e) {
                            $('.barcode').val("");
                            //console.log(e);
                            var name_en = e.join_stock.name_th;
                            var name_th = e.join_stock.name_en;
                            var price = e.price_piece;
                            var photo = e.join_stock.photo;
                            var id = e.id;
                            var time = $.now();

                            var total = price * 1;

                            // console.log(price);
                            //
                            // jQuery.each(e, function(index, value){
                            //     console.log(value);
                            // });
                            if (lang = 'th') {
                                var name = name_th;
                            } else {
                                var name = name_en;
                            }

                            var data = ['<tr class="itemRow">',
                                '<td></td>',
                                '<td><img src="' + photo + '" alt="" width="25%"></td>',
                                '<td><span>' + name + '</span></td>',
                                '<td><input type="number" class="price_total" name="data[' + time + '][amount]" min="1" max="10" value="1"></td>',
                                '<td><input type="hidden" name="data['+time+'][product_id]" value="'+id+'"><input type="hidden" name="data[' + time + '][price]" class="price" value="' + price + '"><span>' + price + '</span></td>',
                                '<td><input type="text" class="result form-control" value="' + total + '" readonly name="data[' + time + '][result]"></td>',
                                '<td><a class="btn btn-danger delete-subject"><i class="mdi mdi-delete-sweep"></i></a></td>',
                            ];

                            data.push(
                                '<td><div class="text-right">' +
                                '<span class="colTotal"></span> </div><input class="tLineTotal" name="" type="hidden" value="' + total + '"></td>', '</tr>');
                            data = data.join('');

                            $('.itemTables').append(data);
                            calTotal();

                        }, error: function () {
                            //$('.barcode').val("");
                            console.log('Error Search Data Product');
                        }
                    });
                }
            });

            $('.itemTables').on("click", '.delete-subject', function() {
                //alert('aaa');
                $(this).closest('tr.itemRow').remove();
                //return false;
                calTotal();
            });

            $('.itemTables').on("change", '.price_total', function() {
                var price = $(this).val();
                var price_product = $('.price').val();
                // console.log(price);
                var total = price*price_product;
                //$('body').parents('tr').find('.result').val(total);
                $(this).parents('tr').find('.result').val(total.toFixed(2));
                // $('.total_').val('0.00');
                $(this).parents('tr').find('.tLineTotal').val(total);
                // $(this).parents('tr').find('.total_').val(total);
                calTotal();
            });

            $('.discount').on('keyup',function(){
                calTotal();
            });

            $('.money').on('keyup',function(){
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
                        $('.total').val(Total.toFixed(2));
                        $('.net').val(total_net.toFixed(2));

                            if(money != 0 && money >= total_net){
                                $('.withdrawal').val(total_money.toFixed(2));
                            }else{
                                $('.withdrawal').val("");
                            }



                    }
                });
            }

            // $('.payment_').on('click',function () {
            //     if($('.form_add').valid()) {
            //         $(this).attr('disabled','disabled').prepend('<i class="fa-spin fa-spinner" style="color: red;"></i> ');
            //     }else{
            //         $('.form_add').submit();
            //     }
            // });

        });
    </script>
@endsection