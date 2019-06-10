{!! Form::model($store,array('url' => array('employee/company_store/edit/file'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.store.name') !!}</lable>
    <div class="col-sm-4">
        <input type="hidden" name="id" value="{!! $store->id !!}">
        {!! Form::text('name',null,array('class'=>'form-control','placeholder'=>trans('messages.store.name'),'required')) !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.store.tell') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('tell',null,array('class'=>'form-control','placeholder'=>trans('messages.store.tell'),'required')) !!}
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.store.tax') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('tax_id',null,array('class'=>'form-control','placeholder'=>trans('messages.store.tax'),'required')) !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.store.mail') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('email',null,array('class'=>'form-control','placeholder'=>trans('messages.store.mail'),'required')) !!}
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.store.address') !!}</lable>
    <div class="col-sm-10">
        {!! Form::textarea('address',null,array('class'=>'form-control','placeholder'=>trans('messages.store.address'),'required')) !!}
    </div>

</div>

<div class="form-group row float-center" style="text-align: center; ">
    <div class="col-sm-12">
        <button class="btn-info btn-primary" id="add-store-btn" type="submit">Save</button>
        <button class="btn-info btn-warning" type="reset">Reset</button>
    </div>
</div>
{!! Form::close() !!}