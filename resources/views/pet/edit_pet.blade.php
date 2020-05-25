{!! Form::model($pet,array('url' => array('employee/pet/update'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
<lable class="col-sm-2 control-label">{!! trans('messages.product.photo') !!}</lable>
<div class="col-sm-10">
    @if(!empty($pet->photo))
        <p style="text-align: center"><img src="{!! asset($pet->photo) !!}" alt="" width="50%">
            @endif</p>
</div>
<br>
<div class="form-group row">
    <input type="hidden" name="id_pet" value="{!! $pet->id !!}">
    <input type="hidden" name="photo_" value="{!! $pet->photo !!}">
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
    <lable class="col-sm-2 control-label">{!! trans('messages.pet.weight') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('weight',null,array('class'=>'form-control num','placeholder'=>trans('messages.pet.weight'))) !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.pet.height') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('height',null,array('class'=>'form-control num','placeholder'=>trans('messages.pet.height'))) !!}
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.pet.birthday') !!}</lable>
    <div class="col-sm-4">
        {!! Form::date('birthday',null,array('class'=>'form-control','placeholder'=>trans('messages.pet.birthday'))) !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.pet.age') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('age',null,array('class'=>'form-control num','placeholder'=>trans('messages.pet.age'))) !!}
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.pet.photo') !!}</lable>
    <div class="col-sm-4">
        {!! Form::file('photo',null,array('class'=>'form-control','placeholder'=>trans('messages.pet.photo'))) !!}
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.pet.detail') !!}</lable>
    <div class="col-sm-10">
        {!! Form::textarea('detail',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}                                    </div>
</div>



<div class="form-group row float-center" style="text-align: center; ">
    <div class="col-sm-12">
        <button class="btn-info btn-primary" id="add-store-btn" type="submit">{!! trans('messages.save') !!}</button>
        <button class="btn-info btn-warning" type="reset">{!! trans('messages.reset') !!}</button>
    </div>
</div>
{!! Form::close() !!}
