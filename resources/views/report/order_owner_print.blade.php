@extends('print')
@section('content')
    <style>
        table {
            border-collapse: collapse;
            padding: 5px;
        }

        table, th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <h3 style="text-align: center;font-weight: bold;">{!! trans('messages.order.order') !!}</h3>
    <br>
    <table style="width:100%;">
        <thead>
        <tr>
            <th>{!! trans('messages.number') !!}</th>
            <th>{!! trans('messages.order.id') !!}</th>
            <th>{!! trans('messages.order.date') !!}</th>
            <th>{!! trans('messages.sub_total') !!}</th>
            <th>{!! trans('messages.order.status') !!}</th>
            {{--<th>{!! trans('messages.action') !!}</th>--}}
        </tr>
        </thead>
        <tbody>
        @if(!empty($p_row))
            @foreach($p_row as $key => $row)
                <tr>
                    <td>{!! $key+1 !!}</td>
                    <td>{!! $row->order_code !!}</td>
                    <td>{!! localDate($row->created_at) !!}</td>
                    <td>{!! number_format($row->total,2) !!}</td>
                    <td>@if(!empty($row->join_bill_payment)) {!! trans('messages.paid') !!} @else {!! trans('messages.n_paid') !!} @endif</td>
                    {{--<td>--}}
                    {{--<button class="btn btn-primary mt-2 mt-xl-0 text-right view-store" data-id="{!! $row->id !!}"><i class="mdi mdi-eye"></i></button>--}}
                    {{--@if(!empty($row->join_bill_payment))--}}
                    {{--<button class="btn btn-warning mt-2 mt-xl-0 text-right" disabled><i class="mdi mdi-tooltip-edit"></i></button>--}}
                    {{--@else--}}
                    {{--<a href="{!! url('employee/edit/order/'.$row->id) !!}"><button class="btn btn-warning mt-2 mt-xl-0 text-right"><i class="mdi mdi-tooltip-edit"></i></button></a>--}}
                    {{--@endif--}}
                    {{--<button class="btn btn-danger mt-2 mt-xl-0 text-right delete-store" data-id="{!! $row->id !!}" @if(!empty($row->join_bill_payment)) disabled @endif><i class="mdi mdi-delete-sweep"></i></button>--}}
                    {{--@if($row->status == 0 )--}}
                    {{--<button class="btn btn-success mt-2 mt-xl-0 text-right app-store" data-id="{!! $row->id !!}"><i class="fa fa-check-square"></i></button>--}}
                    {{--@endif--}}

                    {{--@if($row->status == 2 )--}}
                    {{--<button class="btn btn-primary mt-2 mt-xl-0 text-right to_car" data-id="{!! $row->id !!}"><i class="fa fa-car"></i></button>--}}
                    {{--@endif--}}
                    {{--</td>--}}
                </tr>
            @endforeach
        @else
            <tr>
                <td>{!! trans('messages.no-data') !!}</td>
            </tr>

        @endif
    </table>
@endsection
