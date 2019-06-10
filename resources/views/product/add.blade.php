@extends('home.home_user')
@section('content')
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.product.head_product') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="panel-body" id="landing-subject-list">
                            <form method="POST" id="search-form" action="{!! url('/employee/widen/search_product') !!}" accept-charset="UTF-8" class="form-horizontal">
                                <div class="row">
                                    <div class="col-sm-12 block-input">
                                        <input class="form-control" size="25" placeholder="{!! trans('messages.sell.code') !!}" name="name" required>
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
    </div>

    <br>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="text-align: center;">{!! trans('messages.widen.title') !!}</h3>
                    </div>
                    <div class="panel-body search-form table-responsive">
                        {!! Form::model(null,array('url' => array('/employee/widen/product/widen_product'),'class'=>'form-horizontal form_add','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                        <table class="table itemTables" style="width: 100%">
                            <tr>
                                <th ></th>
                                <th>{!! trans('messages.photo') !!}</th>
                                <th>{!! trans('messages.product.head_product') !!}</th>
                                <th>{!! trans('messages.product.amount') !!}</th>
                                <th>{!! trans('messages.product.price') !!}</th>
                                <th>{!! trans('messages.stock.balance') !!}</th>
                                <th>{!! trans('messages.action') !!}</th>
                            </tr>
                        </table>
                        <tr>
                            <td colspan="5"></td>
                            <td style="text-align: right;"><button class="btn-info btn-primary btn-lg payment_" type="submit"><li class="fa fa-archive"></li> {!! trans('messages.widen.title') !!}</button></td>
                        </tr>
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

            $('.payment_').hide();
            $('.search-store').on('click',function(){
                if($('#search-form').valid()) {
                    $('.show').show();
                    var data = $('#search-form').serialize();
                    var lang = '<?php echo Session::get('locale')?>';
                    //alert('aa');
                    //console.log(data);
                    $('#landing-subject-list').css('opacity', '0.6');
                    $.ajax({
                        url: '/employee/widen/search_product',
                        method: 'post',
                        dataType: 'JSON',
                        data: data,
                        success: function (e) {
                            if(e.name_en != undefined){
                                $('.payment_').show();
                                var name_en = e.name_en;
                                var name_th = e.name_th;
                                var price = e.price;
                                var photo = e.photo;
                                var amount = e.amount;
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
                                    '<td><input type="number" class="price_total" name="data[' + time + '][amount]" min="1" max="10" value="1"></td>',
                                    '<td><input type="hidden" name="data['+time+'][id]" value="'+id+'"><input type="hidden" name="data[' + time + '][price]" class="price" value="' + price + '"><span>' + price + '</span></td>',
                                    '<td><span>'+amount+'</span></td>',
                                    '<td><a class="btn btn-danger delete-subject"><i class="mdi mdi-delete-sweep"></i></a></td>',
                                ];

                                data.push(
                                    '<td><div class="text-right">' +
                                    '<span class="colTotal"></span> </div><input class="tLineTotal" name="" type="hidden" value="' + total + '"></td>', '</tr>');
                                data = data.join('');

                                $('.itemTables').append(data);
                            }

                        }, error: function () {
                            console.log('Error Search Data Product');
                        }
                    });
                }
            });
        });

        $('.itemTables').on("click", '.delete-subject', function() {
            //alert('aaa');
            $(this).closest('tr.itemRow').remove();
            //return false;
        });
    </script>
@endsection