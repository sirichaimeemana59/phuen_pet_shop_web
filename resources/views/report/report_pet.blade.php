@extends('print')
@section('content')
    <style>
        table {
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }
    </style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <h3 style="text-align: center;font-weight: bold;">{!! trans('messages.pet.report_pet') !!}</h3>
    <br>
    <table style="width:100%;">
        <tr>
            <th style="text-align: center;">{!! trans('messages.number') !!}</th>
            <th style="text-align: center;">{!! trans('messages.pet.name') !!}</th>
            <th style="text-align: center;">{!! trans('messages.pet.age') !!}</th>
            <th style="text-align: center;">{!! trans('messages.pet.user') !!}</th>
        </tr>
        @if(!empty($pet))
            @foreach($pet as $key => $row)
                <tr>
                    <td style="text-align: center;">{!! $key+1 !!}</td>
                    <td style="text-align: left; padding-left: 5px;">{!! $row{'name_'.Session::get('locale')} !!}</td>
                    <td style="text-align: center;">@if(!empty($row->age)) {!! $row->age !!} @else - @endif </td>
                    <td style="text-align: center;">@if(!empty($row->user_id)) {!! $row->join_user->name !!} @else - @endif</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td>{!! trans('messages.no-data') !!}</td>
            </tr>

        @endif
    </table>
@endsection
