{!! Form::model($stock,array('url' => array('admin/insert_teacher'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}

<div class="form-group row">
    <lable class="col-sm-4 control-label"></lable>
    <div class="col-sm-4">
        <img src="{!! asset($stock->photo)!!}" alt="" width="100%">
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.store.name_th') !!}</lable>
    <div class="col-sm-4">
        {!! $stock->name_th!!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.store.name_en') !!}</lable>
    <div class="col-sm-4">
        {!! $stock->name_en!!}
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.product.price') !!}</lable>
    <div class="col-sm-4">
        {!! $stock->price !!}  : {!! trans('messages.payment.bath') !!}
    </div>
</div>


<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.product.amount') !!}</lable>
    <div class="col-sm-4">
        {!! $stock->amount !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.product.unit_id') !!}</lable>
    <div class="col-sm-4">
        {!! $stock->join_unit{'name_'.Session::get('locale')} !!}
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.store.title') !!}</lable>
    <div class="col-sm-10">
        {!! $stock->join_store{'name_'.Session::get('locale')} !!}
    </div>

</div>