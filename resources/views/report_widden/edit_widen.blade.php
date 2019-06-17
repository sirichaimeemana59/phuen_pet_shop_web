@extends('home.home_user')
@section('content')
    @if($text == 2)
        <div class="alert alert-danger">
            <strong>{!! trans('messages.sorry') !!}!</strong> {!! trans('messages.sorry_amount_product') !!}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="text-align: center;">{!! trans('messages.report.edit_widen') !!}</h3>
                    </div>
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.report.id_widen') !!} : {!! $widen->code !!}</h3>
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
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            {{--<button type="reset" class="btn btn-white reset-s-btn">{!! trans('messages.reset') !!}</button>--}}
                            <button type="button" class="btn btn-secondary widen-store">{!! trans('messages.widen.title') !!}</button>
                        </div>
                    </div>
                    <br>
                    {!! Form::model(null,array('url' => array('/employee/widen/product/update_widen_product'),'class'=>'form-horizontal form_add','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                    <input type="hidden" name="widen_code" value="{!! $widen->code !!}">
                    <input type="hidden" name="widen_id" value="{!! $widen->id !!}">
                    <div class="panel-body search-form table-responsive">
                        <table class="table itemTables" style="width: 100%">
                            <tr>
                                <th width="2%"></th>
                                <th width="30%">{!! trans('messages.product.head_product') !!}</th>
                                <th width="12%">{!! trans('messages.stock.balance') !!}</th>
                                <th width="20%">{!! trans('messages.unit.title') !!}</th>
                                {{--<th>{!! trans('messages.product.amount') !!}</th>--}}
                                <th width="25%">{!! trans('messages.widen.title') !!}</th>
                                <th width="12%">{!! trans('messages.unit.amount_widen') !!}</th>
                                <th>{!! trans('messages.action') !!}</th>
                            </tr>
                            @foreach($widen_transection as $key => $w)
                                <tr>
                                    <td>{!! $key+1 !!}</td>
                                    <td><input type="hidden" name="data_[{!! $key !!}][product_id]" value="{!! $w->product_id !!}" readonly class="form-control">
                                        <input type="hidden" name="data_[{!! $key !!}][id]" value="{!! $w->id !!}">
                                        <input type="hidden" name="data_[{!! $key !!}][id_product_stock_]" value="{!! $w->id_product_stock !!}">
                                        <input type="text" readonly value="{!! $w->join_product{'name_'.Session::get('locale')} !!}" class="form-control"></td>
                                    <td><input type="hidden" class="amount" value="{!! $w->join_stock['amount'] !!}">{!! $w->join_stock['amount'] !!}</td>
                                    <td><input type="hidden" class="name" value="{!! $w->join_stock_log{'name_'.Session::get('locale')} !!}">{!! $w->join_stock_log{'name_'.Session::get('locale')} !!}</td>
                                    <td><select name="data_[{!! $key !!}][unit_widden]" id="" class="form-control unit_widen ">
                                            <option value="">{!! trans('messages.select_unit') !!}</option>
                                            <option value="{!! $w->join_stock_log->id !!}" @if($w->unit_widden == $w->join_stcok_log['id']) selected @endif>{!! $w->join_stock_log{'name_'.Session::get('locale')} !!}</option>
                                            @foreach($w->join_unit_transection_all as $k => $row)
                                                <option value="{!! $row['id'] !!}" @if($w->unit_widden == $row['id']) selected @endif>{!! $row{'name_'.Session::get('locale')} !!}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select name="data_[{!! $key !!}][amount_widden]" class="amount_widden form-control" style="width:100px;" required>
                                            {{--@if(!($w->join_stock_log))--}}
                                                {{--@for($i=1;$i< $w->join_stock_log->amount;$i++)--}}
                                                    <option value="{!! number_format($w->amount_widden,0) !!}">{!! number_format($w->amount_widden,0) !!} {!! $w->join_stock_log{'name_'.Session::get('locale')} !!}</option>
                                                {{--@endfor--}}
                                            {{--@else--}}
                                                {{--@for($i=1;$i< $w->join_stock_log->amount;$i++)--}}
                                                    {{--<option value="{!! ($w->join_stock['amount'] / $w->join_stock_log->amount)*$i !!}">{!! $i !!} {!! ($w->join_stock['amount'] / $w->join_stock_log->amount)*$i !!} {!! $w->join_stock_log{'name_'.Session::get('locale')} !!}</option>--}}
                                                {{--@endfor--}}
                                            {{--@endif--}}
                                        </select>
                                        {{--<input type="text" class="form-control" name="data_[{!! $key !!}][amount_widden]" value="{!! $w->amount_widden !!}" required>--}}
                                        <input type="hidden" class="form-control" name="data_[{!! $key !!}][amount_log]" value="{!! $w->amount_widden !!}"></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><br>

    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <div class="col-sm-12 text-right">
                            <button class="btn-warning btn-lg payment_" type="button"><li class="fa fa-archive"></li> {!! trans('messages.widen.title') !!}</button>
                            {{--<input type="submit" name="submit"  value="{!! trans('messages.widen.title') !!}" class="btn btn-primary">--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
    <div id="property_select" style="display:none;">
        <select name="product_id" id="property_id" class="form-control" style="width:200px;">
            <option value="">{!! trans('messages.selete_procudt') !!}</option>
            @foreach($stock as $prow)
                <option value="{!! $prow['id'] !!}">{!! $prow['name_th']." ".$prow['name_en'] !!}</option>
            @endforeach
        </select>
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

            //$('.payment_').hide();
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
                               // $('.payment_').show();
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

        $(function () {
            $('.widen-store').on('click', function (e){
               // $('.payment_').show();
                e.preventDefault();
                var time = $.now();
                var property = '<select  name="data['+time+'][product_id]" class="product form-control" style="width:350px;" required>'+ $('#property_select select').html() + '</select>';

                var data = [
                    '<tr class="itemRow">',
                    '<td></td>',
                    '<td style="text-align: left; width:350px;">'+property+'</td>',
                    '<td><input type="text" class="amount form-control" name=data['+time+'][amount] readonly></td>',
                    '<td><select name="data['+time+'][unit_trance]" class="unit_trance form-control" style="width:350px;" required></select></td>',
                    // '<td><input type="text" class="amount_ amount_unit form-control" name=data['+time+'][amount_] readonly></td>',
                    '<td><select name="data['+time+'][unit_widen]" class="unit_widen form-control" style="width:350px;" required></select></td>',
                    '<td><input type="hidden" class="name"><input type="hidden" class="form-control product_code" name=data['+time+'][product_code] readonly>' +
                    '<input type="hidden" class="form-control id_product_stock" name=data['+time+'][id_product_stock] readonly><select name="data['+time+'][amount_widden]" class="amount_widden form-control" style="width:100px;" required></select></td>',
                    '<td><a class="btn btn-danger delete-subject"><i class="mdi mdi-delete-sweep"></i></a></td>',
                    '</tr>'].join('');
                $('.itemTables').append(data);
            });
        });

        $('.unit_trance').attr("disabled", true);
        $('.amount_').attr("disabled", true);


        $('.itemTables').on('change','.product',function(){
           var id = $(this).val();
           var time = $.now();
           var this_ = $(this);
          // console.log(id);
            this_.parents('tr').find('.id').val(id);
            this_.parents('tr').find('.unit_trance').html('');
            this_.parents('tr').find('.unit_widen').html('');

            var product_code = this_.parents('tr').find('.product_code').val();


            $.ajax({
                url : '/select/product/unit_',
                method : 'post',
                dataType : 'json',
                data : ({'id':id}),
                success : function(e){

                    //var amount_ = $.number(e.stock.amount,0);
                    var x = e.stock.amount.split('.');
                    var x1 = x[0];

//                    console.log(e.stock.id);
                    this_.parents('tr').find('.amount').val(x1);
                    this_.parents('tr').find('.amount_').attr("disabled", false);

                    this_.parents('tr').find('.id_product_stock').val(e.stock.id);
                    this_.parents('tr').find('.product_code').val(e.unit_2.product_id);
                    this_.parents('tr').find('.unit_trance').append("<option value='"+e.unit_2.id+"'>"+e.unit_2.name_th+" " + e.unit_2.name_en +"</option>");
                    this_.parents('tr').find('.name').val(e.unit_2.name_th);

                    // console.log(e.unit_2.id);
                    this_.parents('tr').find('.unit_widen').append("<option value=''>Unit</option>");
                    this_.parents('tr').find('.unit_widen').append("<option value='"+e.unit_2.id+"'>"+e.unit_2.name_th+" " + e.unit_2.name_en +"</option>");

                    $.each(e.unit_1,function(i,val) {
                        this_.parents('tr').find('.unit_widen').append("<option value='"+val.id+"'>"+val.name_th+" " + val.name_en +"</option>");
                        this_.parents('tr').find('.unit_id').val(e.unit_1[0].id);

                    });


                    if(e.unit_1.length != 1){
                        for (var i=0; i < e.unit_1.length; i++) {
                            var amount = 0;
                            amount = e.unit_1[0].amount * e.unit_1[i].amount;
                        }
                    }else{
                        for (var i=0; i < e.unit_1.length; i++) {
                            var amount = 0;
                            amount = e.unit_1[0].amount;
                        }
                    }
                    //console.log(amount);
                    //this_.parents('tr').find('.amount').val(amount);

                } ,error : function(){
                    console.log('Error View Data Store');
                }
            });
        });

        $('.itemTables').on('change','.unit_trance',function(){
            var id = $(this).val();
            var time = $.now();
            var this_ = $(this);
             //console.log(id);
            // this_.parents('tr').find('.unit_trance').html('');

            $.ajax({
                url : '/select/product/unit_amount',
                method : 'post',
                dataType : 'json',
                data : ({'id':id}),
                success : function(e){
                     this_.parents('tr').find('.amount').val(e.amount);
                     this_.parents('tr').find('.price').val(e.price);
                } ,error : function(){
                    console.log('Error View Data Store');
                }
            });
        });

        $('.itemTables').on('keypress','.amount_',function(e){

            var code = e.keyCode ? e.keyCode : e.which;

            if(code > 57){
                return false;
            }else if(code < 48 && code != 8){
                return false;
            }

        });

        $('.itemTables').on('keypress','.amount_widden',function(e){

            var code = e.keyCode ? e.keyCode : e.which;

            if(code > 57){
                return false;
            }else if(code < 48 && code != 8){
                return false;
            }

        });

        // function gettext(){
        //     var amount = document.getElementById('amount_widden').value;
        //     console.log(amount);
        // }
        //
        // $('.itemTables').on('keyup','.amount_widden',function(e){
        //
        //     var amount_unit = $('.amount_unit').val();
        //     var amount = $(this).val();
        //
        //     //console.log(amount);
        //     // if(amount > amount_unit){
        //     //     alert('aa');
        //     // }
        // });

        $('.payment_').on('click', function () {
            if($("#form_add").valid()) {
                $(this).attr('disabled','disabled').prepend('<i class="fa-spin fa-spinner"></i> ');
                $("#form_add").submit();
            }
        });

        $('body').on('change','.unit_widen',function(){
            var id = $(this).val();
            var this_ = $(this);
            //console.log(id);
            var amount = this_.parents('tr').find('.amount').val();
            var name = this_.parents('tr').find('.name').val();

            $.ajax({
                url : '/select/product/unit_amount_trance',
                method : 'post',
                dataType : 'json',
                data : ({'id':id}),
                success : function(e){
                    //console.log(e.amount);
                    this_.parents('tr').find('.amount_widden').html('');

                    // var amount =  e.amount_unit / e.amount;
                    var x = amount.split('.');
                    var x1 = x[0];



                    if(e.amount != 1) {
                        for (var i = 1; i <= e.amount; i++) {
                            this_.parents('tr').find('.amount_widden').append("<option value='" + Math.floor((x1 / e.amount) * i) + "'>" + i + " " + Math.floor((x1 / e.amount) * i) + " " + name + "</option>");
                        }
                    }else{
                        for(var i=1;i<=amount;i++){
                            this_.parents('tr').find('.amount_widden').append("<option value='"+i+"'>"+i+" "+name+"</option>");
                        }
                    }


                    this_.parents('tr').find('.amount_').val(e.amount);
                    this_.parents('tr').find('.unit_id').val(e.id);
                    // this_.parents('tr').find('.product_code').val(e.product_id);
                } ,error : function(){
                    console.log('Error View Data Store');
                }
            });
        });
    </script>
@endsection