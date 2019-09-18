<lable class="col-sm-2 control-label">{!! trans('messages.sale') !!} : {!! $sell->order_id !!}</lable>
<div class="col-sm-10">

</div>

<br>
<div class="table-responsive table-striped">
    <table cellspacing="0" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>{!! trans('messages.number') !!}</th>
            <th>{!! trans('messages.id_sale') !!}</th>
            <th>{!! trans('messages.sale_total') !!}</th>
            <th>{!! trans('messages.report.date') !!}</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($sell))
           @foreach($sell as $key => $row)
                <td>{!! $key+1 !!}</td>
               <td>{!! $row->order_id !!}</td>
               <td></td>
               <td>{!! localDate($row->created_at) !!}</td>
           @endforeach
        @else
            <tr>
                <td>{!! trans('messages.no-data') !!}</td>
            </tr>

        @endif
        </tbody>
    </table>
</div>

