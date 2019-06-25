{!! Form::model($new,array('url' => array('employee/news/update'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
<lable class="col-sm-2 control-label">{!! trans('messages.product.photo') !!}</lable>
<div class="col-sm-10">
    @if(!empty($new->photo))
        <p style="text-align: center"><img src="{!! asset($new->photo) !!}" alt="" width="50%">
            @endif</p>
</div>
<br>
<div class="form-group row">
    <input type="hidden" name="id_new" value="{!! $new->id !!}">
    <input type="hidden" name="photo_" value="{!! $new->photo !!}">
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
    <lable class="col-sm-2 control-label">{!! trans('messages.news.detail_th') !!}</lable>
    <div class="col-sm-10">
        {!! Form::textarea('detail_th',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40,'required']) !!}                                    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.news.detail_en') !!}</lable>
    <div class="col-sm-10">
        {!! Form::textarea('detail_en',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40,'required']) !!}                                    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.pet.photo') !!}</lable>
    <div class="col-sm-4">
        {!! Form::file('photo',null,array('class'=>'form-control','placeholder'=>trans('messages.pet.photo'))) !!}
    </div>
</div>


<div class="form-group row float-center" style="text-align: center; ">
    <div class="col-sm-12">
        <button class="btn-info btn-primary" id="add-store-btn" type="submit">Save</button>
        <button class="btn-info btn-warning" type="reset">Reset</button>
    </div>
</div>
{!! Form::close() !!}