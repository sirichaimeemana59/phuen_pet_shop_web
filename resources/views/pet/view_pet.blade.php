{!! Form::model($pet,array('url' => array('admin/insert_teacher'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
<lable class="col-sm-2 control-label">{!! trans('messages.product.photo') !!}</lable>
<div class="col-sm-10">
    @if(!empty($pet->photo))
        <p style="text-align: center"><img src="{!! asset($pet->photo) !!}" alt="" width="50%">
            @endif</p>
</div>
<br>
<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.name') !!}</lable>
    <div class="col-sm-4">
        {!! $pet{'name_'.Session::get('locale')} !!}
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.pet.weight') !!}</lable>
    <div class="col-sm-4">
        {!! $pet->weight !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.pet.height') !!}</lable>
    <div class="col-sm-4">
        {!! $pet->height !!}
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.pet.birthday') !!}</lable>
    <div class="col-sm-4">
        {!! $pet->birthday !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.pet.age') !!}</lable>
    <div class="col-sm-4">
        {!! $pet->age !!}
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.pet.birthday') !!}</lable>
    <div class="col-sm-10">
        {!! $pet->detail !!}
    </div>
</div>