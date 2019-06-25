{!! Form::model($comment,array('url' => array('employee/comment/update'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}

<lable class="col-sm-2 control-label">{!! trans('messages.product.photo') !!}</lable>
<div class="col-sm-10">
    @if(!empty($comment->photo))
        <p style="text-align: center"><img src="{!! asset($comment->photo) !!}" alt="" width="50%"></p>
            @endif
</div>
<br>
<input type="hidden" name="id_com" value="{!! $comment->id !!}">
<input type="hidden" name="photo_" value="{!! $comment->photo !!}">
<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.comment.name') !!}</lable>
    <div class="col-sm-10">
        {!! Form::textarea('comment',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40,'required']) !!}
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.pet.photo') !!}</lable>
    <div class="col-sm-4">
        {!! Form::file('photo',null,array('class'=>'form-control','placeholder'=>trans('messages.pet.photo'))) !!}
    </div>
</div>


<div class="form-group row float-center" style="text-align: center; ">
    <div class="col-sm-12">
        <button class="btn-info btn-primary" id="add-store-btn" type="submit">Save</button>
        <button class="btn-info btn-warning" type="reset">Reset</button>
    </div>
</div>
{!! Form::close() !!}