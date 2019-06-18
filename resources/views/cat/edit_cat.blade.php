{!! Form::model($cat,array('url' => array('employee/cat/update'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
<div class="form-group row">
    <input type="hidden" name="id_cat" value="{!! $cat->id !!}">
    <lable class="col-sm-2 control-label">{!! trans('messages.group.title') !!}</lable>
    <div class="col-sm-4">
        @if(count($group) != 0)
            <select name="group" id="" class="form-control">
                <option value="">{!! trans('messages.selete_group') !!}</option>
                @foreach($group as $key => $row)
                    <option value="{!! $row->id !!}" @if($row->id == $cat->group_id) selected @endif>{!! $row{'name_'.Session::get('locale')} !!}</option>
                @endforeach
            </select>
        @endif
    </div>

    <lable class="col-sm-2 control-label"></lable>
    <div class="col-sm-4">
        <button type="button" class="btn btn-secondary add_group">{!! trans('messages.group.add') !!}</button>

    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.category.name_th') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('name_th',null,array('class'=>'form-control','placeholder'=>trans('messages.category.name_th'),'required')) !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.category.name_en') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('name_en',null,array('class'=>'form-control','placeholder'=>trans('messages.category.name_en'),'required')) !!}
    </div>
</div>

<div class="form-group row float-center" style="text-align: center; ">
    <div class="col-sm-12">
        <button class="btn-info btn-primary" id="add-store-btn" type="submit">Save</button>
        <button class="btn-info btn-warning" type="reset">Reset</button>
    </div>
</div>
{!! Form::close() !!}