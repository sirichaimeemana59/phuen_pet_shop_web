@extends('home.home_user')
@section('content')
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.order.order') !!}</h3>
                    </div>
                    <div class="panel-body search-form">
                        <form method="POST" id="search-form" action="#" accept-charset="UTF-8" class="form-horizontal">
                            <div class="row">
                                <lable class="col-sm-2 control-label">{!! trans('messages.order.order') !!}</lable>
                                <div class="col-sm-4">
                                    <input class="form-control" size="25" placeholder="{!! trans('messages.category.name') !!}" name="name">
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
                        <h3 class="panel-title">{!! trans('messages.order.order') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <a href="{!! url('employee/create/order_bill') !!}"><button class="btn btn-primary mt-2 mt-xl-0 text-right"><i class="fa fa-archive"></i>  {!! trans('messages.order.order') !!}</button></a>
                            </div>
                        </div>
                        <br>
                        <div class="panel-body" id="landing-subject-list">
                            @include('order_customer.list_order_element')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal view store-->
    <div class="modal fade" id="view-store" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #9BA2AB;">
                    <h4 class="modal-title" style="color: #bbbfc3;">{!! trans('messages.order.order') !!}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="lead-content" class="form">

                            </div>
                        </div>
                    </div>
                    <span class="v-loading">กำลังค้นหาข้อมูล...</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- End Modal view store-->

    <!-- Modal view addredd-->
    <div class="modal fade" id="view-address" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #9BA2AB;">
                    <h4 class="modal-title" style="color: #bbbfc3;">{!! trans('messages.profile.address') !!}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <lable class="col-sm-2 control-label">{!! trans('messages.profile.name') !!}</lable>
                                <div class="col-sm-4">
                                    <input class="form-control id_order" size="25" placeholder="{!! trans('messages.order.id') !!}" name="name">
                                </div>

                                <lable class="col-sm-2 control-label">{!! trans('messages.profile.name') !!}</lable>
                                <div class="col-sm-4">
                                    <input class="form-control name" size="25" placeholder="{!! trans('messages.category.name') !!}" name="name">
                                </div>
                            </div>

                            <div class="row">
                                <lable class="col-sm-2 control-label">{!! trans('messages.profile.address') !!}</lable>
                                <div class="col-sm-4">
                                    <input class="form-control address" size="25" placeholder="{!! trans('messages.category.name') !!}" name="name">
                                </div>

                                <lable class="col-sm-2 control-label">{!! trans('messages.profile.tell') !!}</lable>
                                <div class="col-sm-4">
                                    <input class="form-control tell" size="25" placeholder="{!! trans('messages.category.name') !!}" name="name">
                                </div>
                            </div>

                            <div class="row">
                                <lable class="col-sm-2 control-label">{!! trans('messages.profile.sub') !!}</lable>
                                <div class="col-sm-4">
                                    <input class="form-control sub" size="25" placeholder="{!! trans('messages.category.name') !!}" name="name">
                                </div>

                                <lable class="col-sm-2 control-label">{!! trans('messages.profile.district') !!}</lable>
                                <div class="col-sm-4">
                                    <input class="form-control dis" size="25" placeholder="{!! trans('messages.category.name') !!}" name="name">
                                </div>
                            </div>

                            <div class="row">
                                <lable class="col-sm-2 control-label">{!! trans('messages.profile.province') !!}</lable>
                                <div class="col-sm-4">
                                    <input class="form-control province" size="25" placeholder="{!! trans('messages.category.name') !!}" name="name">
                                </div>

                                <lable class="col-sm-2 control-label">{!! trans('messages.profile.post') !!}</lable>
                                <div class="col-sm-4">
                                    <input class="form-control post_code" size="25" placeholder="{!! trans('messages.category.name') !!}" name="name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="v-loading">กำลังค้นหาข้อมูล...</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- End Modal view addredd-->
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
                //alert('aa');
                //console.log(data);
                $('#landing-subject-list').css('opacity','0.6');
                $.ajax({
                    url : '/customer/list_order',
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
                window.location.href ='/customer/list_order';
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
                    '<span class="colTotal"></span> </div><input class="tLineTotal" name="" type="text" value=""></td>', '</tr>');
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

            $('body').on('click','.view-store',function(){
                var id = $(this).data('id');
                $('#view-store').modal('show');
                $('#lead-content').empty();
                $('.v-loading').show();
                $.ajax({
                    url : '/employee/order/view',
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        $('#lead-content').html(e);
                        $('.v-loading').hide();
                    } ,error : function(){
                        console.log('Error View Data Order');
                    }
                });
            });

            $('body').on('click','.delete-store',function(){
                var id = $(this).data('id');
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete)=> {
                    if (willDelete) {
                        setTimeout(function() {
                            $.post("/employee/order/delete", {
                                id: id
                            }, function(e) {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                }).then(function(){
                                    window.location.href ='/employee/list_order_customer'
                                });
                            });
                        }, 50);
                    } else {
                        swal("Your imaginary file is safe!");
            }
            });
            });

            $('body').on('click','.app-store',function(){
                var id = $(this).data('id');
                swal({
                    title: "Are you sure?",
                    text: "You want to confirm this order.",
                    icon: "success",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete)=> {
                    if (willDelete) {
                        setTimeout(function() {
                            $.post("/employee/approved_order", {
                                id: id
                            }, function(e) {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                }).then(function(){
                                    window.location.href ='/employee/list_order_customer'
                                });
                            });
                        }, 50);
                    } else {
                        swal("Your imaginary file is safe!");
            }
            });
            });

            $('body').on('click','.to_car',function(){
               var id = $(this).data('id');
                $('#view-address').modal('show');
                $('.v-loading').show();
               //console.log(id);
                $.ajax({
                    url : '/employee/order/sent_to_car',
                    method : 'post',
                    dataType : 'JSON',
                    data : ({'id':id}),
                    success : function(e){
                        $('.v-loading').hide();
                        console.log(e.address_);
                        $('.id_order').val(e.address_.code_order);
                        $('.address').val(e.address_.address);
                        $('.dis').val(e.address_.name{!!'_'. Session::get('locale') !!});
                        {{--$('.sub').val(e.address_.name{!!'_'. Session::get('locale') !!});--}}
                        $('.province').val(e.address_.name_in{!!'_'. Session::get('locale') !!});
                        $('.post_code').val(e.address_.post_code);
                        $('.tell').val(e.address_.tell);
                        $('.sub').val(e.address_.name_sub{!!'_'. Session::get('locale') !!});
                        $('.name').val(e.address_.name);
                    } ,error : function(){
                        console.log('Error View Data Order');
                    }
                });
            });
        });
    </script>
@endsection