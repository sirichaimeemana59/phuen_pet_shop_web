        {!! Form::model($product,array('url' => array('employee/product/update'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}

        <lable class="col-sm-2 control-label"></lable>
        <div class="col-sm-10">
            <p style="text-align: center"><img src="{!! asset($product->join_stock->photo) !!}" alt="" width="50%"></p>
        </div>
        <br>

                        <input type="hidden" name="id" value="{!! $product->id !!}">
                         <input type="hidden" name="product_id" value="{!! $product->product_id !!}">
                            <div class="form-group row">
                                <lable class="col-sm-2 control-label">{!! trans('messages.product.head_product') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::text('name',$product->join_stock{'name_'.Session::get('locale')},array('class'=>'form-control amount','placeholder'=>trans('messages.product.amount'),'readonly')) !!}
                                </div>

                                <lable class="col-sm-2 control-label">{!! trans('messages.bar_code') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::text('bar_code',$product->bar_code,array('class'=>'form-control','placeholder'=>trans('messages.bar_code'),'required')) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <lable class="col-sm-2 control-label">{!! trans('messages.product.price') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::text('price',$product->price_piece,array('class'=>'form-control amount','placeholder'=>trans('messages.product.amount'),'required')) !!}
                                </div>

                                <lable class="col-sm-2 control-label">{!! trans('messages.product.unit_id') !!}</lable>
                                <div class="col-sm-4">
                                    <select name="unit_sale" id="" class="form-control unit_id">
                                        <option value="">{!! trans('messages.select_unit') !!}</option>
                                        <option value="{!! $stock_log->id !!}" @if($product->unit_sale == $stock_log->id) selected @endif>{!! $stock_log{'name_'.Session::get('locale')} !!}</option>
                                        @foreach($uni_tran as $key => $val)
                                        <option value="{!! $val->id !!}" @if($product->unit_sale == $val->id) selected @endif>{!! $val->{'name_'.Session::get('locale')} !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row float-center" style="text-align: center; ">
                                <div class="col-sm-12">
                                    <button class="btn-info btn-primary" id="add-store-btn" type="submit">{!! trans('messages.save') !!}</button>
                                    <button class="btn-info btn-warning" type="reset">{!! trans('messages.reset') !!}</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
