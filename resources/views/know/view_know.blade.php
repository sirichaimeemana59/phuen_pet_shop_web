{!! Form::model($know,array('url' => array('admin/insert_teacher'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
<lable class="col-sm-2 control-label">{!! trans('messages.product.photo') !!}</lable>
<div class="col-sm-10">
    @if(!empty($know->photo))
        <p style="text-align: center"><img src="{!! asset($know->photo) !!}" alt="" width="50%">
            @endif</p>
</div>
<br>
<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.name') !!}</lable>
    <div class="col-sm-4">
        {!! $know{'name_'.Session::get('locale')} !!}
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.know.detail') !!}</lable>
    <div class="col-sm-10">
        {!! $know{'detail_'.Session::get('locale')} !!}
    </div>
</div>