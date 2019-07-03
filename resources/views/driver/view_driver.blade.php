{!! Form::model($driver,array('url' => array('admin/insert_teacher'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.name') !!}</lable>
    <div class="col-sm-4">
        {!! $driver{'name_'.Session::get('locale')} !!}
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.pet.weight') !!}</lable>
    <div class="col-sm-4">
        {!! $driver->price !!}
    </div>
</div>
