<div class="table-responsive">
    <table class="table">
        <tr>
            <th>{!! trans('messages.number') !!}</th>
            <th>{!! trans('messages.finance.code') !!}</th>
            <th>{!! trans('messages.finance.total') !!}</th>
            <th>{!! trans('messages.finance.date') !!}</th>
        </tr>
        <?php $sum = 0;?>
        @foreach($order as $key => $t)
            <tr>
                <td>{!! $key+1 !!}</td>
                <td>{!! $t->code_order !!}</td>
                <td style="text-align: right;">{!! $t->grand_total !!}</td>
                <td>{!! localDate($t->created_at) !!}</td>
                <?php $sum += $t->grand_total?>
            </tr>
        @endforeach
        <tr>
            <td style="text-align: right; font-weight: bold;" colspan="2">{!! trans('messages.total') !!}</td>
            <td style="text-align: right;">{!! number_format($sum,2) !!}</td>
            <td>{!! trans('messages.payment.bath') !!}</td>
        </tr>
    </table>
</div>