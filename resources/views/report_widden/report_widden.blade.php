@extends('print')
@section('content')
    <style>

        .none {border-style: none;}
        .hidden {border-style: hidden;}
    </style>

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
<u><p style="text-align: center">{!! trans('messages.report.report_widen') !!}</p></u>
<br>

<div class="table-responsive none">
    <table class="table none" style="border-color: #d6e9f9;width: 100%">
        <td>
        <td style="text-align: right;">
            <p>{!! trans('messages.report.report_widen') !!} : {!! trans('messages.report.date') !!} : {!! localDate($widen->created_at) !!}</p>
        </td>
        </tr>
    </table>
</div>


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
