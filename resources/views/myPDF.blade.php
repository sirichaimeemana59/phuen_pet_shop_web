<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{!! asset('font_/font/THSarabunNew/THSarabunNew.ttf') !!}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{!! asset('font_/font/THSarabunNew/THSarabunNew Bold.ttf') !!}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{!! asset('font_/font/THSarabunNew/THSarabunNew Boldltalic.ttf') !!}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{!! asset('font_/font/THSarabunNew/THSarabunNew ltalic.ttf') !!}") format('truetype');
        }

        body{
            font-family: THSarabunNew;
            font-size: 25px;
            /*font-family: Arial, Helvetica, sans-serif;*/
        }
    </style>
</head>
<body style="padding: 0px; margin: 0px;">
<h3 style="text-align: center;">{!! $title !!}</h3>
<div class="table-responsive">
    <table class="table" style="width: 100%">
        <tr>
            <th></th>
            <th>{!! trans('messages.product.name_') !!}</th>
            <th>{!! trans('messages.product.amount') !!}</th>
            <th>{!! trans('messages.product.price') !!}</th>
            <th>{!! trans('messages.product.total') !!}</th>
        </tr>
        <?php $sub_total = 0;?>
@foreach($order_trans as $key => $val)
    <tr>
        <td></td>
        <td style="text-align: right;">{!! $val->join_product->join_stock['name_'.Session::get('locale')] !!}</td>
        <td style="text-align: right;">{!! $val->amount !!}</td>
        <td style="text-align: right;">{!! $val->price_unit !!}</td>
        <td style="text-align: right;">{!! $val->total_price !!}</td>
    </tr>
        <?php
            $sub_total += $val->total_price;
            ?>
    {{--@if(!empty($val->join_stock_log)){!! $val->join_stock_log['name_'.Session::get('locale')] !!}@else {!! $val->join_unit_tran['name_'.Session::get('locale')] !!} @endif--}}
@endforeach
        <tr>
            <td colspan="5" style="font-weight: bold;"><hr></td>
        </tr>
        <tr>
            <td colspan="4" style="font-weight: bold;">{!! trans('messages.sub_total') !!}</td>
            <td style="text-align: right;">{!! number_format($sub_total,2) !!}</td>
        </tr>
        <tr>
            <td colspan="4" style="font-weight: bold;">{!! trans('messages.discount') !!}</td>
            <td style="text-align: right;">@if(!empty($data->discount)){!! number_format($data->discount,2) !!} @else - @endif</td>
        </tr>
        <tr>
            <td colspan="4" style="font-weight: bold;">{!! trans('messages.vat') !!}</td>
            <td style="text-align: right;">@if(!empty($data->vat)){!! number_format($data->vat,2) !!}@else - @endif</td>
        </tr>
        <tr>
            <td colspan="4" style="font-weight: bold;">{!! trans('messages.total') !!}</td>
            <td style="text-align: right;">@if(!empty($data->grand_total)){!! number_format($data->grand_total,2) !!}@else - @endif</td>
        </tr>
        <tr>
            <td colspan="4" style="font-weight: bold;">{!! trans('messages.cash') !!}</td>
            <td style="text-align: right;">@if(!empty($data->money)){!! number_format($data->money,2) !!}@else - @endif</td>
        </tr>
        <tr>
            <td colspan="4" style="font-weight: bold;">{!! trans('messages.change') !!}</td>
            <td style="text-align: right;">{!! number_format(abs($data->grand_total - $data->money),2) !!}</td>
        </tr>
    </table>
</div>
</body>
</html>
