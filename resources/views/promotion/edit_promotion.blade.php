{!! Form::model($promotion,array('url' => array('employee/promotion/update'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.pet.name_th') !!}</lable>
    <div class="col-sm-4">
        <input type="hidden" name="id_pro" value="{!! $promotion->id !!}">
        {!! Form::text('name_th',null,array('class'=>'form-control','placeholder'=>trans('messages.pet.name_th'),'required')) !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.pet.name_en') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('name_en',null,array('class'=>'form-control','placeholder'=>trans('messages.pet.name_en'),'required')) !!}
    </div>
</div>


<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.promotion.detail_th') !!}</lable>
    <div class="col-sm-10">
        {!! Form::textarea('detail_th',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}                                    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.promotion.detail_en') !!}</lable>
    <div class="col-sm-10">
        {!! Form::textarea('detail_en',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}                                    </div>
</div>


<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.promotion.discount') !!}</lable>
    <div class="col-sm-10">
        {!! Form::text('discount',null,array('class'=>'form-control num','placeholder'=>trans('messages.promotion.discount'),'required')) !!}
    </div>
</div>


<div class="form-group row float-center" style="text-align: center; ">
    <div class="col-sm-12">
        <button class="btn-info btn-primary" id="add-store-btn" type="submit">Save</button>
        <button class="btn-info btn-warning" type="reset">Reset</button>
    </div>
</div>
{!! Form::close() !!}