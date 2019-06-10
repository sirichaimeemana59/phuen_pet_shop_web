{!! Form::model($store,array('url' => array('admin/insert_teacher'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.store.name') !!}</lable>
    <div class="col-sm-4">
        {!! $store->name !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.store.tell') !!}</lable>
    <div class="col-sm-4">
        {!! $store->tell !!}
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.store.tax') !!}</lable>
    <div class="col-sm-4">
        {!! $store->tax_id !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.store.mail') !!}</lable>
    <div class="col-sm-4">
        {!! $store->email !!}    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.store.address') !!}</lable>
    <div class="col-sm-10">
        {!! $store->address !!}
    </div>

</div>