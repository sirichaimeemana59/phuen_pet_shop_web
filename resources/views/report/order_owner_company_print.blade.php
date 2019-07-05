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

    <div class="head">
        <p style="text-align: center;"><img src="{!! asset($store_profile->photo_logo) !!}" alt="" width="50%"></p>
        <p style="text-align: center;">
            {!! $store_profile{'name_'.Session::get('locale')} !!}<br>
            {!! $store_profile->address !!}<br>
            {!! $store_profile->tell !!}
        </p>
    </div>
    
    <h3 style="text-align: center;font-weight: bold;">{!! trans('messages.order.order_com') !!}</h3>
    <br>
    <table style="width:100%;">
        <tr>
            <th>{!! trans('messages.number') !!}</th>
            <th>{!! trans('messages.order.id') !!}</th>
            <th>{!! trans('messages.order.date') !!}</th>
            <th>{!! trans('messages.order.status') !!}</th>
            {{--<th>{!! trans('messages.action') !!}</th>--}}
        </tr>
        @if(!empty($p_row))
            @foreach($p_row as $key => $row)
                <tr>
                    <td>{!! $key+1 !!}</td>
                    <td>{!! $row->code !!}</td>
                    <td>{!! localDate($row->created_at) !!}</td>
                    <td>-</td>
                    {{--<td>--}}
                    {{--<button class="btn btn-primary mt-2 mt-xl-0 text-right view-store" data-id="{!! $row->id !!}"><i class="mdi mdi-eye"></i></button>--}}
                    {{--<a href="{!! url('employee/edit/order_company/'.$row->id) !!}"><button class="btn btn-warning mt-2 mt-xl-0 text-right"><i class="mdi mdi-tooltip-edit"></i></button></a>--}}
                    {{--<button class="btn btn-danger mt-2 mt-xl-0 text-right delete-store" data-id="{!! $row->id !!}"><i class="mdi mdi-delete-sweep"></i></button>--}}
                    {{--@if($row->status == 0 )--}}
                    {{--<button class="btn btn-success mt-2 mt-xl-0 text-right app-store" data-id="{!! $row->id !!}"><i class="fa fa-check-square"></i></button>--}}
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
