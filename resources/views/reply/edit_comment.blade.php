{!! Form::model($comment,array('url' => array('employee/add/reply'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}

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
        {!! Form::textarea('comment',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40,'readonly']) !!}
    </div>
</div>

{{--<div class="form-group row">--}}
    {{--<lable class="col-sm-2 control-label">{!! trans('messages.pet.photo') !!}</lable>--}}
    {{--<div class="col-sm-4">--}}
        {{--{!! Form::file('photo',null,array('class'=>'form-control','placeholder'=>trans('messages.pet.photo'))) !!}--}}
    {{--</div>--}}
{{--</div>--}}
@if(empty($comment->join_reply))
        <div class="form-group row">
            <lable class="col-sm-2 control-label">{!! trans('messages.comment.reply') !!}</lable>
            <div class="col-sm-10">
                {!! Form::textarea('reply',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}
            </div>
        </div>
    @else
    @foreach($comment->join_reply as $t)
        <div class="form-group row">
            <lable class="col-sm-2 control-label">{!! trans('messages.comment.reply') !!}</lable>
            <div class="col-sm-10">
                {{--@foreach($comment->join_reply as $key => $t)--}}
                <input type="hidden" name="id_reply" value="{!! $t['id'] !!}">
                {!! Form::textarea('reply_',$t['reply'],['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}
                {{--@endforeach--}}
            </div>
        </div>
    @endforeach
@endif

<div class="form-group row float-center" style="text-align: center; ">
    <div class="col-sm-12">
        <button class="btn-info btn-primary" id="add-store-btn" type="submit">Save</button>
        <button class="btn-info btn-warning" type="reset">Reset</button>
    </div>
</div>
{!! Form::close() !!}