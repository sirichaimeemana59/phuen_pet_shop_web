@extends('print')
@section('content')
<style>
    /*table {*/
        /*border-collapse: collapse;*/
    /*}*/

    /*table, th, td {*/
        /*border: 1px solid black;*/
    /*}*/
</style>
<div class="table-responsive">
    <table class="table" width="auto">
        <tr>
            <td>
                {!! trans('messages.order.order') !!} : {!! $order->order_code !!}
                <br>
                {!! trans('messages.profile.name') !!} : {!! $address_->name !!}
                <br>
                {!! trans('messages.profile.tell') !!} : {!! $address_->tell !!}
                <br>
                {!! trans('messages.profile.address') !!} : {!! $address_->address !!}
                <br>
                {!! trans('messages.profile.sub') !!} : {!! $address_->{'name_sub_'.Session::get('locale')} !!}
                <br>
                {!! trans('messages.profile.district') !!} : {!! $address_->{'name_'.Session::get('locale')} !!}
                <br>
                {!! trans('messages.profile.province') !!} : {!! $address_->{'name_in_'.Session::get('locale')} !!}
                <br>
                {!! trans('messages.profile.post') !!} : {!! $address_->post_code !!}
            </td>
            {{--<td></td>--}}
        </tr>
        {{--<tr>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
        {{--</tr>--}}
    </table>
</div>
@endsection