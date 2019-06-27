

<div class="form-group row">
    <lable class="col-sm-12 control-label"><h3>{!! trans('messages.order.order') !!} : {!! $order->code !!}</h3></lable>
</div>
<table class="table itemTables" style="width: 100%">
    <tr>
        <th></th>
        <th>{!! trans('messages.product.head_product') !!}</th>
        <th>{!! trans('messages.product.amount') !!}</th>
        <th>{!! trans('messages.unit.title') !!}</th>
    </tr>

@foreach($order_ as $t)
    <tr>
        <td></td>
        <td>@if(!empty($t->join_stock)){!! $t->join_stock{'name_'.Session::get('locale')} !!}@else {!! $t->name !!} @endif</td>
        <td style="text-align: right;">{!! $t->amount !!}</td>
        <td>@if(!empty($t->join_stock->join_stock_log) OR !empty($t->join_stock->join_unit_transection))@if(!empty($t->join_stock)){!! $t->join_stock->join_stock_log{'name_'.Session::get('locale')} !!} @else {!! $t->join_stock->join_unit_transection{'name_'.Session::get('locale')} !!} @endif @else {!! $t['unit_name'] !!} @endif</td>
    </tr>
@endforeach

