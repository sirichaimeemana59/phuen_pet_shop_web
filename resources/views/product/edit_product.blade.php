{!! Form::model($product,array('url' => array('employee/product/update'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.product.name_th') !!}</lable>
    <input type="hidden" name="id" value="{!! $product->id !!}">
    <input type="hidden" name="photo_" value="{!! $product->photo !!}">
    <div class="col-sm-4">
        {!! Form::text('name_th',null,array('class'=>'form-control','placeholder'=>trans('messages.product.name_th'),'required')) !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.product.name_en') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('name_en',null,array('class'=>'form-control','placeholder'=>trans('messages.product.name_en'),'required')) !!}
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.product.amount') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('amount',null,array('class'=>'form-control','placeholder'=>trans('messages.product.amount'),'required')) !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.product.unit_id') !!}</lable>
    <div class="col-sm-4">
        <select name="unit_id" id="" class="form-control">
            <option value="">{!! trans('messages.select_unit') !!}</option>
            @foreach($unit as $key => $val)
                <option value="{!! $val->id !!}" @if($product->unit_id == $val->id) selected @endif>{!! $val->{'name_'.Session::get('locale')} !!}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.product.price') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('price',null,array('class'=>'form-control','placeholder'=>trans('messages.product.price'),'required')) !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.product.photo') !!}</lable>
    <div class="col-sm-4">
        {!! Form::file('photo',null,array('class'=>'form-control')) !!}
    </div>

</div>

<div class="form-group row float-center" style="text-align: center; ">
    <div class="col-sm-12">
        <button class="btn-info btn-primary" id="add-store-btn" type="submit">Save</button>
        <button class="btn-info btn-warning" type="reset">Reset</button>
    </div>
</div>
{!! Form::close() !!}