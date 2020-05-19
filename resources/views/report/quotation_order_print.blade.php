@extends('print')
@section('content')
    <style>
        table {
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <div class="table-responsive none">
        <table class="table none" style="border-color: #d6e9f9;width: 100%">
            <tr class="none">
                <td width="*" class="none">
                    <br><br>
                    @if(!empty($store_profile->photo_logo))
                        <p style="text-align:left;"><img src="{!! asset($store_profile->photo_logo) !!}" alt="" style="align:left">
                            @endif</p>
                </td>
                <td style="text-align: center;padding-right: 115px;" width="80%" class="none">
                    <p>{!! $store_profile->{'name_'.Session::get('locale')} !!}</p>
                    <p>{!! trans('messages.store_profile.address') !!} : {!! $store_profile->address !!}</p>
                    <p>{!! trans('messages.store_profile.tell') !!} : {!! $store_profile->tell !!}</p>
                </td>
            </tr>
        </table>
    </div>

    <br>
    <u><p style="text-align: center">{!! trans('messages.quotation.title') !!} : {!! $order_customer->order_code !!}</p></u>
    <br>


    <div class="table-responsive table-striped">
    <table class="table itemTables" style="width: 100%">
        <tr>
            <th>{!! trans('messages.number') !!}</th>
            <th>{!! trans('messages.product.head_product') !!}</th>
            <th>{!! trans('messages.product.price') !!}</th>
            <th>{!! trans('messages.unit.title') !!}</th>
            {{--<th>{!! trans('messages.product.amount') !!}</th>--}}
            <th>{!! trans('messages.product.amount') !!}</th>
            <th>{!! trans('messages.product.total') !!}</th>
        </tr>
        <?php $sum = 0;?>
        @foreach($order_tran as $key =>  $t)
            <tr>
                <td>{!! $key=1 !!}</td>
                <td>{!! $t->join_stock{'name_'.Session::get('locale')} !!}</td>
                <td style="text-align: right;">{!! $t->price_product !!}</td>
                <td>@if(!empty($t->join_stock_log)){!! $t->join_stock_log{'name_'.Session::get('locale')} !!} @else {!! $t->join_unit_transection_all{'name_'.Session::get('locale')} !!} @endif</td>
                <td style="text-align: right;">{!! $t->amount !!}</td>
                <td style="text-align: right;">{!! $t->total_price !!}</td>
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
@endsection
