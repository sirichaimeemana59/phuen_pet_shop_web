{!! Form::model($group,array('url' => array('employee/group/update'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
<div class="form-group row">
    <input type="hidden" name="id_group" value="{!! $group->id !!}">
    <lable class="col-sm-2 control-label">{!! trans('messages.group.name_th') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('name_th',null,array('class'=>'form-control','placeholder'=>trans('messages.group.name_th'),'required')) !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.group.name_en') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('name_en',null,array('class'=>'form-control','placeholder'=>trans('messages.group.name_en'),'required')) !!}
    </div>
</div>
<div class="form-group row float-center" style="text-align: center; ">
    <div class="col-sm-12">
        <button class="btn-info btn-primary" id="add-store-btn" type="submit">Save</button>
        <button class="btn-info btn-warning" type="reset">Reset</button>
    </div>
</div>
{!! Form::close() !!}