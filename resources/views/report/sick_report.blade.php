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
                    @if(!empty($profile->photo_logo))
                        <p style="text-align:left;"><img src="{!! asset($profile->photo_logo) !!}" alt="" style="align:left">
                            @endif</p>
                </td>
                <td style="text-align: center;padding-right: 115px;" width="80%">
                    <p>{!! $profile->{'name_'.Session::get('locale')} !!}</p>
                    <p>{!! trans('messages.store_profile.address') !!} : {!! $profile->address !!}</p>
                    <p>{!! trans('messages.store_profile.tell') !!} : {!! $profile->tell !!}</p>
                </td>
            </tr>
        </table>
    </div>

    <br>
    <u><p style="text-align: center">{!! trans('messages.analyze.analyze') !!}</p></u>
    <br>

    <table style="width:100%;" class=" border border_1">
        <thead>
        <tr class=" border border_1">
            <th class=" border border_1">{!! trans('messages.number') !!}</th>
            <th class=" border border_1" width="100">{!! trans('messages.analyze.name') !!}</th>
            <th class=" border border_1" width="100">{!! trans('messages.analyze.syndrome') !!}</th>
            <th class=" border border_1" width="*">{!! trans('messages.analyze.detail') !!}</th>
{{--            <th class=" border border_1">{!! trans('messages.order.status') !!}</th>--}}
            {{--<th>{!! trans('messages.action') !!}</th>--}}
        </tr>
        </thead>
        <tbody>
        @if(!empty($p_row))
            @foreach($p_row as $key => $row)
                <tr class=" border border_1">
                    <td class=" border border_1" style="vertical-align: top">{!! $key+1 !!}</td>
                    <td class=" border border_1" style="vertical-align: top">{!! $row->{'name_'.Session::get('locale')} !!}</td>
                    <td class=" border border_1" style="vertical-align: top">{!! $row->join_sick_transection_one{'sick_'.Session::get('locale')} !!}</td>
                    <td class=" border border_1" style="vertical-align: top">{!! $row->join_sick_transection_one{'detail_'.Session::get('locale')} !!}</td>
                </tr>
            @endforeach
        @else
            <tr class=" border border_1">
                <td>{!! trans('messages.no-data') !!}</td>
            </tr>

        @endif
    </table>
@endsection
