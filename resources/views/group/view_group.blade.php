{!! Form::model($group,array('url' => array('admin/insert_teacher'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.group.title') !!}</lable>
    <div class="col-sm-4">
        {!! $group{'name_'.Session::get('locale')} !!}
    </div>
</div>
