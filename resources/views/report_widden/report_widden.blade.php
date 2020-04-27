@extends('print')
@section('content')
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>{!! trans('messages.number') !!}</th>
                <th>{!! trans('messages.product.product_id') !!}</th>
                <th>{!! trans('messages.product.name_') !!}</th>
                <th>{!! trans('messages.product.amount') !!}</th>
                <th>{!! trans('messages.product.unit_id') !!}</th>
                <th>{!! trans('messages.report.date') !!}</th>
            </tr>
            @foreach($widen_transection as $key => $w)
                <tr>
                    <td>{!! $key+1 !!}</td>
                    <td>{!! $w->product_id !!}</td>
                    <td>{!! $w->join_product{'name_'.Session::get('locale')} !!}</td>
                    <td>{!! $w->amount_widden !!}</td>
                    <td>{!! $w->join_unit_transection['name_th'] !!}</td>
                    <td>{!! localDate($w->created_at) !!}</td>
                </tr>
            @endforeach
        </table>
    @endsection
