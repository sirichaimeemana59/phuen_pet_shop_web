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

    <h3 style="text-align: center;font-weight: bold;">{!! trans('messages.product.head_product') !!}</h3>
    <br>
    <table style="width: 100%">
        <thead>
        <tr>
            <th>{!! trans('messages.number') !!}</th>
            <th>{!! trans('messages.report.id_widen') !!}</th>
            <th>{!! trans('messages.report.user') !!}</th>
            <th>{!! trans('messages.report.date') !!}</th>
            {{--<th>{!! trans('messages.action') !!}</th>--}}
        </tr>
        </thead>
        <tbody>
        @if(!empty($widden_product))
            @foreach($widden_product as $key => $row)
                <tr>
                    <td>{!! $key+1 !!}</td>
                    <td>{!! $row->code !!}</td>
                    <td>@if(!empty($row->join_profile)){!! $row->join_profile{'name_'.Session::get('locale')} !!} @else - @endif</td>
                    <td>{!! localDate($row->date) !!}</td>
                    {{--<td>--}}
                    {{--<a href="{!! url('/employee/detail/widen/'.$row->id) !!}"><button class="btn btn-primary mt-2 mt-xl-0 text-right"><i class="mdi mdi-eye"></i></button></a>--}}
                    {{--<a href="{!! url('/employee/widen/edit/'.$row->id) !!}"><button class="btn btn-warning mt-2 mt-xl-0 text-right"><i class="mdi mdi-tooltip-edit"></i></button></a>--}}
                    {{--<button class="btn btn-danger mt-2 mt-xl-0 text-right delete-store" data-id="{!! $row->id !!}"><i class="mdi mdi-delete-sweep"></i></button>--}}
                    {{--<a href="{!! url('/report/widden/'.$row->id) !!}" target="_blank"><button class="btn btn-success mt-2 mt-xl-0 text-right"><i class="mdi mdi-printer"></i></button></a>--}}
                    {{--</td>--}}
                </tr>
            @endforeach
        @else
            <tr>
                <td>{!! trans('messages.no-data') !!}</td>
            </tr>

        @endif
        </tbody>
    </table>
@endsection
