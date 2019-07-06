{!! Form::model($user,array('url' => array('active/add'),'class'=>'form-horizontal','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.user.name') !!}</lable>
    <div class="col-sm-4">
        <input type="hidden" name="id" value="{!! $user->id !!}">
        {!! Form::text('name',null,array('class'=>'form-control','placeholder'=>trans('messages.user.name'),'readonly')) !!}
    </div>

    <lable class="col-sm-2 control-label">{!! trans('messages.user.mail') !!}</lable>
    <div class="col-sm-4">
        {!! Form::text('email',null,array('class'=>'form-control','placeholder'=>trans('messages.user.mail'),'readonly')) !!}
    </div>
</div>

<div class="form-group row">
    <lable class="col-sm-2 control-label">{!! trans('messages.user.role') !!}</lable>
    <div class="col-sm-10">
        <?php
        if($user->role == 0){
            $s0 = 'SELECTED';
            $s1 = '';
            $s2 = '';
            $s3 = '';
        }elseif($user->role == 1){
            $s1 = 'SELECTED';
            $s0 = '';
            $s2 = '';
            $s3 = '';
        }elseif($user->role == 2){
            $s2 = 'SELECTED';
            $s0 = '';
            $s1 = '';
            $s3 = '';
        }else{
            $s3 = 'SELECTED';
            $s1 = '';
            $s2 = '';
            $s0 = '';
        }
        ?>

        <select name="role" id="" class="form-control" readonly disabled>
            <option value="" >{!! trans('messages.user.select') !!}</option>
            <option value="0" {!! $s0 !!}>{!! trans('messages.user.admin') !!}</option>
            <option value="2" {!! $s2 !!}>{!! trans('messages.user.owner') !!}</option>
            <option value="3" {!! $s3 !!}>{!! trans('messages.user.employee') !!}</option>
            <option value="1" {!! $s1 !!}>{!! trans('messages.user.customer') !!}</option>
        </select>
    </div>
</div>
{{--<div class="form-group row float-center" style="text-align: center; ">--}}
    {{--<div class="col-sm-12">--}}
        {{--<button class="btn-info btn-primary" id="add-store-btn" type="submit">Save</button>--}}
        {{--<button class="btn-info btn-warning" type="reset">Reset</button>--}}
    {{--</div>--}}
{{--</div>--}}
