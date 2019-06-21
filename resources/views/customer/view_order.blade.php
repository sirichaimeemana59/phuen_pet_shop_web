

<div class="form-group row">
    <lable class="col-sm-12 control-label"><h3>{!! trans('messages.order.order') !!} : {!! $order_customer->order_code !!}</h3></lable>
</div>

<table class="table itemTables" style="width: 100%">
    <tr>
        <th></th>
        <th>{!! trans('messages.product.head_product') !!}</th>
        <th>{!! trans('messages.product.price') !!}</th>
        <th>{!! trans('messages.unit.title') !!}</th>
        {{--<th>{!! trans('messages.product.amount') !!}</th>--}}
        <th>{!! trans('messages.product.amount') !!}</th>
        <th>{!! trans('messages.product.total') !!}</th>
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
