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
        .none {border-style: none;}
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
    <u><p style="text-align: center">{!! trans('messages.order.order') !!}</p></u>
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
