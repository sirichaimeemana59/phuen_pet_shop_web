<div class="teble-responsive">
    <table class="table" style="width: 100%">
        <tr><td><h3>{!! $sick->{'name_'.Session::get('locale')} !!}</h3></td></tr>
        @foreach($sick->join_sick_transection as $val)
            <tr>
                <td style="text-align: left;padding-left: 5px;"></td>
                <td style="text-align: left;padding-left: 5px;"><li class="fa fa-hand-o-right" aria-hidden="true">  {!! $val->{'sick_'.Session::get('locale')} !!}</li></td>
            </tr>

            <tr>
                <td style="text-align: left;padding-left: 5px;"></td>
                <td style="text-align: left;padding-left: 25px;"><li class="fa fa-hand-o-right" aria-hidden="true">  {!! $val->{'detail_'.Session::get('locale')} !!}</li></td>
            </tr>

            @if($val->type == 1)
            <tr>
                <td style="text-align: left;padding-left: 5px;"></td>
                <td style="text-align: left;padding-left: 25px;"><li class="fa fa-hand-o-right" aria-hidden="true">
                        <button class="btn btn-success" type="button" data-toggle="dropdown">{!! trans('messages.normal') !!}</li></td>
            </tr>
            @elseif($val->type == 2)
                <tr>
                    <td style="text-align: left;padding-left: 5px;"></td>
                    <td style="text-align: left;padding-left: 25px;"><li class="fa fa-hand-o-right" aria-hidden="true">
                            <button class="btn btn-warning" type="button" data-toggle="dropdown">{!! trans('messages.self') !!}</li></td>
                </tr>
            @elseif($val->type == 3)
                <tr>
                    <td style="text-align: left;padding-left: 5px;"></td>
                    <td style="text-align: left;padding-left: 25px;"><li class="fa fa-hand-o-right" aria-hidden="true">
                            <button class="btn btn-danger" type="button" data-toggle="dropdown">{!! trans('messages.doctor') !!}</li></td>
                </tr>
            @endif

        @endforeach
    </table>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.analyze.detail') !!}</lable>
    <div class="col-sm-10">
        {!! $sick->{'detail_'.Session::get('locale')} !!}
    </div>
</div>
