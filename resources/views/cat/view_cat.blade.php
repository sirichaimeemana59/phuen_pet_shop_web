{!! Form::model($cat,array('url' => array('admin/insert_teacher'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}

<div class="form-group row">
    <lable class="col-sm-2 control-label"><h3>{!! trans('messages.group.title') !!}</h3></lable>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label"></lable>
    <div class="col-sm-4">
        {!! $cat{'name_'.Session::get('locale')} !!}
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label"><h3>{!! trans('messages.category.title') !!}</h3></lable>
</div>

@foreach($cat->join_cat as $t)
    <div class="form-group row">
        <lable class="col-sm-2 control-label"></lable>
        <div class="col-sm-10">
            {!! $t{'name_'.Session::get('locale')} !!}
        </div>
    </div>
@endforeach


