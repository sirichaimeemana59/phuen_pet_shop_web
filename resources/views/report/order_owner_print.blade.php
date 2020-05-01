@extends('print')
@section('content')
    <style>
        .border {
            border-collapse: collapse;
            padding: 5px;
        }

        .border_1 {
            border: 1px solid black;
            padding: 5px;
        }

        .none {border-style: none;}
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <div class="table-responsive none">
        <table class="table none" style="border-color: #d6e9f9;width: 100%">
            <tr class="none">
                <td width="*">
                    <br><br>
                    @if(!empty($store_profile->photo_logo))
                        <p style="text-align:left;"><img src="{!! asset($store_profile->photo_logo) !!}" alt="" style="align:left">
                            @endif</p>
                </td>
                <td style="text-align: center;padding-right: 115px;" width="80%">
                    <p>{!! $store_profile->{'name_'.Session::get('locale')} !!}</p>
                    <p>{!! trans('messages.store_profile.address') !!} : {!! $store_profile->address !!}</p>
                    <p>{!! trans('messages.store_profile.tell') !!} : {!! $store_profile->tell !!}</p>
                </td>
            </tr>
        </table>
    </div>

    <br>
    <u><p style="text-align: center">{!! trans('messages.order.order') !!}</p></u>
    <br>

    <table style="width:100%;" class=" border border_1">
        <thead>
        <tr class=" border border_1">
            <th class=" border border_1">{!! trans('messages.number') !!}</th>
            <th class=" border border_1">{!! trans('messages.order.id') !!}</th>
            <th class=" border border_1">{!! trans('messages.order.date') !!}</th>
            <th class=" border border_1">{!! trans('messages.sub_total') !!}</th>
            <th class=" border border_1">{!! trans('messages.order.status') !!}</th>
            {{--<th>{!! trans('messages.action') !!}</th>--}}
        </tr>
        </thead>
        <tbody>
        @if(!empty($p_row))
            @foreach($p_row as $key => $row)
                <tr class=" border border_1">
                    <td class=" border border_1">{!! $key+1 !!}</td>
                    <td class=" border border_1">{!! $row->order_code !!}</td>
                    <td class=" border border_1">{!! localDate($row->created_at) !!}</td>
                    <td class=" border border_1">{!! number_format($row->total,2) !!}</td>
                    <td class=" border border_1">@if(!empty($row->join_bill_payment)) {!! trans('messages.paid') !!} @else {!! trans('messages.n_paid') !!} @endif</td>
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
            <tr class=" border border_1">
                <td>{!! trans('messages.no-data') !!}</td>
            </tr>

        @endif
    </table>
@endsection
