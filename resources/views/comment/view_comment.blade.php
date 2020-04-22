{!! Form::model($comment,array('url' => array('admin/insert_teacher'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
<lable class="col-sm-2 control-label">{!! trans('messages.product.photo') !!}</lable>
<div class="col-sm-10">
    @if(!empty($comment->photo))
        <p style="text-align: center"><img src="{!! asset($comment->photo) !!}" alt="" width="50%">
            @endif</p>
</div>
<br>
<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.comment.title') !!}</lable>
    <div class="col-sm-10">
        {!! $comment->comment !!}
    </div>
</div>

<div class="form-group row">
    @if(!empty($reply))
        @foreach($reply as $t)
            <div class="col-sm-10">
                <lable class="col-sm-2 control-label">{!! trans('messages.comment.reply') !!}</lable>
                {!! $t->reply !!}
            </div></br>
        @endforeach
    @endif
</div>
