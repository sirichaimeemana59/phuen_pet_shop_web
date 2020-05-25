{!! Form::model($driver,array('url' => array('employee/driver/update'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
<div class="form-group row">
    <input type="hidden" name="id" value="{!! $driver->id !!}">
    <lable class="col-sm-2 control-label">{!! trans('messages.pet.name_th') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('name_th',null,array('class'=>'form-control','placeholder'=>trans('messages.pet.name_th'),'required')) !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.pet.name_en') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('name_en',null,array('class'=>'form-control','placeholder'=>trans('messages.pet.name_en'),'required')) !!}
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.product.price') !!}</lable>
    <div class="col-sm-10">
        {!! Form::text('price',null,array('class'=>'form-control num','placeholder'=>trans('messages.product.price'),'required')) !!}
    </div>
</div>


<div class="form-group row float-center" style="text-align: center; ">
    <div class="col-sm-12">
        <button class="btn-info btn-primary" id="add-store-btn" type="submit">{!! trans('messages.save') !!}</button>
        <button class="btn-info btn-warning" type="reset">{!! trans('messages.reset') !!}</button>
    </div>
</div>
{!! Form::close() !!}
