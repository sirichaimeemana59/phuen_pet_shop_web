
@extends('print')
@section('content')
    <style>
        .table_border {
            border-collapse: collapse;
            border: 1px solid black;
        }


    </style>
{{--<div class="form-group row">--}}
    {{--<lable class="col-sm-12 control-label"><h3>{!! trans('messages.order.order') !!} : {!! $order_customer->order_code !!}</h3></lable>--}}
{{--</div>--}}
<div class="table-responsive" style="border-style:none;">
    <table class="table itemTables" style="width: 100%; border-style:none;">
        <tr>
            <td style="text-align:left; padding-left: 5px;">
                @if(!empty($store_profile)) <img src="{!! asset($store_profile->photo_logo) !!}" alt="" width="10%"> @else - @endif
                    <br>
                @if(!empty($store_profile)) {!! $store_profile{'name_'.Session::get('locale')} !!} @else - @endif <br>
                @if(!empty($store_profile)) {!! $store_profile->address !!} @else - @endif <br>
                @if(!empty($store_profile)) {!! $store_profile->tell !!} @else - @endif
            </td>
            <td style="text-align:left; padding-left: 5px;">
                {!! trans('messages.order.order') !!} : {!! $order_customer->order_code !!} <br>
                @if(!empty($profile)) {!! $profile->name !!} @else - @endif<br>
                @if(!empty($profile)) {!! $profile->address !!} @else - @endif <br>
                @if(!empty($profile)) @if(Session::get('locale') == 'th' ){!! $profile->name_sub_th !!} @else {!! $profile->name_sub_en !!} @endif @else - @endif <br>
                @if(!empty($profile)) @if(Session::get('locale') == 'th' ){!! $profile->name_th !!} @else {!! $profile->name_en !!} @endif @else - @endif <br>
                @if(!empty($profile)) @if(Session::get('locale') == 'th' ){!! $profile->name_in_th !!} @else {!! $profile->name_in_en !!} @endif @else - @endif <br>
                @if(!empty($profile)) {!! $profile->post_code !!} @else - @endif <br>
                @if(!empty($profile)) {!! $profile->tell !!} @else - @endif
            </td>
        </tr>
    </table>
</div>
<br>
<div class="table-responsive table_border">
    <table class="table itemTables table_border" style="width: 100%">
        <tr class="table_border">
            <th class="table_border" width="2%">{!! trans('messages.number') !!}</th>
            <th class="table_border">{!! trans('messages.product.head_product') !!}</th>
            <th class="table_border">{!! trans('messages.product.price') !!}</th>
            <th class="table_border">{!! trans('messages.product.amount') !!}</th>
            <th class="table_border">{!! trans('messages.unit.title') !!}</th>
            {{--<th>{!! trans('messages.product.amount') !!}</th>--}}
            <th class="table_border">{!! trans('messages.product.total') !!}</th>
        </tr>
        <?php $sum = 0;?>
        @foreach($order_tran as $key => $t)
            <tr class="table_border">
                <td class="table_border">{!! $key+1 !!}</td>
                <td class="table_border">{!! $t->join_stock{'name_'.Session::get('locale')} !!}</td>
                <td class="table_border" style="text-align: right;">{!! $t->price_product !!}</td>
                <td class="table_border" style="text-align: right;">{!! $t->amount !!}</td>
                <td class="table_border">@if(!empty($t->join_stock_log)){!! $t->join_stock_log{'name_'.Session::get('locale')} !!} @else {!! $t->join_unit_transection_all{'name_'.Session::get('locale')} !!} @endif</td>
                <td class="table_border" style="text-align: right;">{!! $t->total_price !!}</td>
                <?php
                $sum += $t->total_price;
                ?>
            </tr>
        @endforeach
        <tr>
            <td colspan="5" style="text-align: right;font-weight: bold;">{!! trans('messages.sell.total') !!}</td>
            <td style="text-align: right;">{!! number_format($sum,2) !!}</td>
        </tr>
    </table>

    {{--<div class="row">--}}
        {{--<lable class="col-sm-4 control-label">{!! trans('messages.bill.title') !!}</lable>--}}
        {{--<div class="col-sm-4">--}}
            {{--@if(!empty($order_customer->join_bill_payment))--}}
                {{--<p style="text-align: center;"><img src="{!! asset($order_customer->join_bill_payment->photo) !!}" alt="" width="50%"></p>--}}
            {{--@endif--}}
        {{--</div>--}}
    {{--</div>--}}
</div>
<br><br><br>

    @if(!empty($profile))
<div class="table-responsive" style="border-style:none;">
    <table class="table itemTables" style="width: 100%;border-style:none;">
    <tr>
        <td style="text-align:left; padding-left: 5px;">
            <?php $date = date('Y-d-m')?>
            <h2 style="text-align: center;">{!! trans('messages.customer') !!}</h2><br><br>
                <p style="text-align: center;">{!! trans('messages.sign') !!}  (---------------------------------------------) </p><br>
            <p style="text-align: center;"> {!! $profile->name !!} </p>
            <p style="text-align: center">{!! localDate($date) !!}</p>
        </td>
        <td style="text-align:left; padding-left: 5px;">
            <h2 style="text-align: center;">{!! trans('messages.payee') !!}</h2><br><br>
            <p style="text-align: center;">{!! trans('messages.sign') !!}  (---------------------------------------------) </p><br>
            <p style="text-align: center;"> (---------------------------------------------) </p>
            <p style="text-align: center">{!! localDate($date) !!}</p>
        </td>
    </tr>
</table>
</div>
    @endif
@endsection