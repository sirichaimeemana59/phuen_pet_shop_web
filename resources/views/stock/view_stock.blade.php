{!! Form::model($stock,array('url' => array('admin/insert_teacher'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}

<div class="form-group row">
    <lable class="col-sm-4 control-label"></lable>
    <div class="col-sm-4">
        <img src="{!! asset($stock->photo)!!}" alt="" width="100%">
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
                    <th>{!! trans('messages.unit.name_th') !!}</th>
                    <th>{!! trans('messages.unit.name_en') !!}</th>
                    <th>{!! trans('messages.unit.amount') !!}</th>
                    <th>{!! trans('messages.unit.price') !!}</th>
                </tr>

                    @foreach($unit_ as $key => $val)
                        <tr>
                            <td><input type="text" name="" class="form-control" value="{!! $val->name_th !!}" readonly></td>
                            <td><input type="text" name="" class="form-control" value="{!! $val->name_en !!}" readonly></td>
                            <td><input type="text" name="" class="form-control num" value="{!! $val->amount !!}" readonly></td>
                            <td><input type="text" name="" class="form-control num" value="{!! $val->price !!}" readonly></td>
                        </tr>
                    @endforeach
            </table>
        </div>
    </div>
</div>
