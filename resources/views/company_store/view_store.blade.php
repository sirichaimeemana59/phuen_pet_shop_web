{!! Form::model($store,array('url' => array('admin/insert_teacher'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.store.name_th') !!}</lable>
    <div class="col-sm-4">
        {!! $store->name_th!!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.store.name_en') !!}</lable>
    <div class="col-sm-4">
        {!! $store->name_en!!}
    </div>
</div>

<div class="form-group row">
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
        {!! $store->join_Districts->{'name_'.Session::get('locale')}!!}
        {!! $store->join_Subdistricts->{'name_'.Session::get('locale')}!!}
        {!! $store->join_province->{'name_in_'.Session::get('locale')}!!}
        {!! $store->join_Subdistricts->zip_code!!}
    </div>

</div>