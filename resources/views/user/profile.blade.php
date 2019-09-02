@extends('home.home_user')
@section('content')
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.profile.title') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="panel-body" id="landing-subject-list">
                            @if(!empty($profile))
                                {!! Form::model($profile,array('url' => array('user/update_profile'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                                <input type="hidden" name="id" value="{!! $profile->id !!}">
                                <input type="hidden" name="photo_" value="{!! $profile->photo !!}">
                                <input type="hidden" class="property_id" value="{!! $profile->id !!}">
                                <input type="hidden" class="dis" name="dis" value="{!! $profile->distric_id !!}">
                                <input type="hidden" class="subdis" name="subdis" value="{!! $profile->sub_id !!}">
                                <input type="hidden" class="pro" name="pro" value="{!! $profile->povince_id !!}">
                                <input type="hidden"  name="color_left" value="{!! $profile->color_left !!}">
                                <input type="hidden"  name="color_top" value="{!! $profile->color_top !!}">
                                <input type="hidden"  name="color_menu" value="{!! $profile->color_menu !!}">
                            @else
                                {!! Form::model(null,array('url' => array('user/add_profile'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                            @endif
                            <div class="form-group row">
                                <lable class="col-sm-2 control-label">{!! trans('messages.profile.name_th') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::text('name_th',null,array('class'=>'form-control','placeholder'=>trans('messages.profile.name_th'),'required')) !!}
                                </div>

                                <lable class="col-sm-2 control-label">{!! trans('messages.profile.name_en') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::text('name_en',null,array('class'=>'form-control','placeholder'=>trans('messages.profile.name_en'),'required')) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <lable class="col-sm-2 control-label">{!! trans('messages.profile.birthday') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::date('birthday',null,array('class'=>'form-control','placeholder'=>trans('messages.profile.birthday'))) !!}
                                </div>

                                <lable class="col-sm-2 control-label">{!! trans('messages.profile.tell') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::text('tell',null,array('class'=>'form-control','placeholder'=>trans('messages.profile.tell'))) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <lable class="col-sm-2 control-label">{!! trans('messages.profile.address') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::text('address',null,array('class'=>'form-control','placeholder'=>trans('messages.profile.address'))) !!}
                                </div>

                                <lable class="col-sm-2 control-label">{!! trans('messages.profile.email') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::text('email',null,array('class'=>'form-control','placeholder'=>trans('messages.profile.email'))) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ trans('messages.AboutProp.province') }}</label>
                                <div class="col-sm-4">
                                    @if(!empty($profile->povince_id))
                                        {!! Form::select('province',$provinces,$profile->povince_id,array('class'=>'form-control province')) !!}
                                    @else
                                        {!! Form::select('province',$provinces,null,array('class'=>'form-control province')) !!}
                                    @endif
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('messages.AboutProp.district') }}</label>
                                <div class="col-sm-4">
                                    @if(!empty($profile->povince_id))
                                        {!! Form::select('district',$districts,$profile->distric_id,array('class'=>'form-control district')) !!}
                                    @else
                                        {!! Form::select('district',$districts,null,array('class'=>'form-control district')) !!}
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">{{ trans('messages.AboutProp.subdistricts') }}</label>
                                <div class="col-sm-4">
                                    {!! Form::select('sub_district',$subdistricts,null,array('class'=>'form-control subdistricts')) !!}
                                </div>

                                <label class="col-sm-2 control-label">{{ trans('messages.AboutProp.postcode') }}</label>
                                <div class="col-sm-4">
                                    {!! Form::text('post_code',null,array('class'=>'form-control postcode','maxlength' => 10, 'placeholder'=> trans('messages.AboutProp.postcode'))) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <lable class="col-sm-2 control-label">{!! trans('messages.pet.photo') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::file('photo',null,array('class'=>'form-control','placeholder'=>trans('messages.pet.photo'))) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br>
        {{--///////--}}
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.profile.color') !!}</h3>
                    </div>
                    <div class="form-group row">
                        <lable class="col-sm-2 control-label">{!! trans('messages.profile.color_left') !!}</lable>
                        <div class="col-sm-4">
                            {!! Form::color('color_left',null,array('class'=>'form-control','placeholder'=>trans('messages.profile.color_left'))) !!}
                        </div>

                        <lable class="col-sm-2 control-label">{!! trans('messages.profile.color_content') !!}</lable>
                        <div class="col-sm-4">
                            {!! Form::color('color_content',null,array('class'=>'form-control','placeholder'=>trans('messages.profile.color_content'))) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <lable class="col-sm-2 control-label">{!! trans('messages.profile.color_top') !!}</lable>
                        <div class="col-sm-4">
                            {!! Form::color('color_top',null,array('class'=>'form-control','placeholder'=>trans('messages.profile.color_top'))) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--///////////--}}
                {{--////////////////////////////////////////////////////////////////////////////////////--}}
        <br><br><br><br>
        <div class="col-md-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row float-center" style="text-align: center; ">
                            <div class="col-sm-12">
                                <button class="btn-info btn-primary" id="add-store-btn" type="submit">Save</button>
                                <button class="btn-info btn-warning" type="reset">Reset</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        {{--//////////////////////////////--}}

    </div>

@endsection

@section('script')
    <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/js/jquery-validate/jquery.validate.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            @if(!empty($profile))
            $('.subdistricts').attr("disabled", false);
            $('.district').attr("disabled", false);
            @else
            $('.subdistricts').attr("disabled", true);
            $('.district').attr("disabled", true);
            @endif


            $('.province').on('change',function(){
                $('.district').attr("disabled", false);
                var id;
                id = $(this).val();
                $.ajax({
                    url : $('#root-url').val()+"/customer/select/district",
                    method : 'post',
                    dataType: 'html',
                    data : ({'id':id}),
                    success: function (e) {
                        $(".district").html('');
                        $(".district").append("<option value=''>อำเภอ/เขต</option>");
                        $.each($.parseJSON(e), function(i, val){
                            $(".district").append("<option value='"+val.id+"'>"+val.name_th+" "+val.name_en+"</option>");
                        });
                    },
                    error : function () {


                    }
                })
            })

            function SelectDistrict(id){
                $('.subdistricts').attr("disabled", false);
                var id = id;
                //console.log(id);
                $.ajax({
                    url : $('#root-url').val()+"/root/admin/select/subdistrict",
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        $('.subdistricts').html('');
                        $.each($.parseJSON(e),function(i,val){
                            $('.subdistricts').append("<option value='"+val.id+"'>"+val.name_th+" "+val.name_en+"</option>");
                            $('.postcode').val(val.zip_code);
                        });

                    },error : function(){

                    }
                })
            }

            $('body').ready(function(){
                var id = $('.property_id').val();
                var dis = $('.dis').val();
                var subdis = $('.subdis').val();
                var select;
                //console.log(dis);
                $.ajax({
                    url : $('#root-url').val()+"/customer/select/district/edit",
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        console.log(e);
                        $('.district').html('');
                        $('.district').append("<option value=''>อำเภอ</option>");
                        $.each($.parseJSON(e),function(i,val){
                            if(val.id == dis){
                                select = "selected";
                                $('.district').append("<option value='"+val.id+"' selected='"+select+"'>"+val.name_th+" "+val.name_en+"</option>");
                            }else {
                                select = "";
                                $('.district').append("<option value='"+val.id+"'>"+val.name_th+" "+val.name_en+"</option>");
                            }
                            //console.log(select);
                            $('.postcode').val(val.zip_code);
                            //console.log(val.id);
                        });
                    },error : function(){
                        console.log('aa');
                    }
                })
                ////////////////////////////////
                $.ajax({
                    url : $('#root-url').val()+"/customer/select/editSubDis",
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        $('.subdistricts').html('');
                        $('.subdistricts').append("<option value=''>ตำบล</option>");
                        $.each($.parseJSON(e),function(i,val){
                            if(val.id == subdis){
                                select = "selected";
                                $('.subdistricts').append("<option value='"+val.id+"' selected='"+select+"'>"+val.name_th+" "+val.name_en+"</option>");
                            }else {
                                select = "";
                                $('.subdistricts').append("<option value='"+val.id+"'>"+val.name_th+" "+val.name_en+"</option>");
                            }
                            $('.postcode').val(val.zip_code);
                        });
                    },error : function(){
                        console.log('aa');
                    }
                })
            })

            $('.district').on('change',function(){
                $('.subdistricts').attr("disabled", false);
                var id = $(this).val();
                console.log(id);
                $.ajax({
                    url : $('#root-url').val()+"/customer/select/subdistrict",
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        //console.log(e);
                        $('.subdistricts').html('');
                        $('.subdistricts').append("<option value=''>ตำบล</option>");
                        $.each($.parseJSON(e),function(i,val){
                            $('.subdistricts').append("<option value='"+val.id+"'>"+val.name_th+" "+val.name_en+"</option>");
                            $('.postcode').val(val.zip_code);
                        });
                    },error : function(){
                        console.log('aa');
                    }
                })
            })

            $('.subdistricts').on('change',function(){
                var id = $(this).val();
                //console.log(id);
                $.ajax({
                    url : $('#root-url').val()+"/address/select/zip_code",
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        $.each($.parseJSON(e),function(i,val){
                            $('.postcode').val(val.zip_code);
                        });
                        //console.log(e);

                    },error : function(){
                        //console.log('aa');
                    }
                })
            })

        });
    </script>
@endsection