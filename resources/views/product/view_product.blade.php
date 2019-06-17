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
    <lable class="col-sm-2 control-label">{!! trans('messages.product.price') !!}</lable>
    <div class="col-sm-4">
        @if(!empty($product->price_pack)){!! $product->price_pack !!} @else {!! $product->price_piece !!} @endif
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.product.unit_id') !!}</lable>
    <div class="col-sm-4">
        @if(!empty($product->join_stock_log)){!! $product->join_stock_log{'name_'.Session::get('locale')} !!} @else {!! $product->join_unit_transection_all{'name_'.Session::get('locale')} !!} @endif
    </div>
</div>
