{!! Form::model($product,array('url' => array('admin/insert_teacher'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
<lable class="col-sm-2 control-label">{!! trans('messages.product.photo') !!}</lable>
<div class="col-sm-10">
    <img src="{!! asset($product->join_stock->photo) !!}" alt="" width="50%">
</div>
<br>
<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.name') !!}</lable>
    <div class="col-sm-4">
        {!! $product->join_stock{'name_'.Session::get('locale')} !!}
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.product.amount') !!}</lable>
    <div class="col-sm-4">
        {!! $product->join_stock->psc !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.product.unit_id') !!}</lable>
    <div class="col-sm-4">
        @if($product->unit_sale == 1){!! trans('messages.sale_mode.pack') !!} @else {!! trans('messages.sale_mode.piece') !!} @endif
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.product.price') !!}</lable>
    <div class="col-sm-10">
        @if(!empty($product->price_pack)){!! $product->price_pack !!} @else {!! $product->price_piece !!} @endif
    </div>

</div>