{!! Form::model($stock,array('url' => array('admin/insert_teacher'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}

<div class="form-group row">
    <lable class="col-sm-4 control-label"></lable>
    <div class="col-sm-4">
        <img src="{!! asset($stock->photo)!!}" alt="" width="100%">
    </div>
</div>
<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.group.title') !!}</lable>
    <div class="col-sm-4">
        {!! $stock->join_cat{'name_'.Session::get('locale')}!!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.category.title') !!}</lable>
    <div class="col-sm-4">
        {!! $stock->join_cat_tran{'name_'.Session::get('locale')}!!}
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.store.name_th') !!}</lable>
    <div class="col-sm-4">
        {!! $stock->name_th!!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.store.name_en') !!}</lable>
    <div class="col-sm-4">
        {!! $stock->name_en!!}
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.unit.title') !!}</lable>
    <div class="col-sm-10">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th width="*"></th>
                    <th>{!! trans('messages.unit.name_th') !!}</th>
                    <th>{!! trans('messages.unit.name_en') !!}</th>
                    <th>{!! trans('messages.unit.amount') !!}</th>
                    <th>{!! trans('messages.unit.amount_unit') !!}</th>
                </tr>
                <tr>
                    <td>{!! trans('messages.unit.unit_small') !!}</td>
                    <td><input type="text" name="name_unit_th" class="form-control name_th" required value="{!! $stock_log->name_th !!}"></td>
                    <td><input type="text" name="name_unit_en" class="form-control name_en" required value="{!! $stock_log->name_en !!}"></td>
                    <td><input type="text" name="amount1" class="form-control num" readonly value="{!! $stock_log->amount !!}"></td>
                </tr>

                    @foreach($unit_ as $key => $val)
                        <tr>
                            <td></td>
                            <td><input type="text" name="" class="form-control" value="{!! $val->name_th !!}" readonly></td>
                            <td><input type="text" name="" class="form-control" value="{!! $val->name_en !!}" readonly></td>
                            <td><input type="text" name="" class="form-control num" value="{!! $val->amount !!}" readonly></td>
                            <td><input type="text" name="" class="form-control num" value="{!! $val->amount_unit !!}" readonly></td>
                        </tr>
                    @endforeach
            </table>
        </div>
    </div>
</div>
