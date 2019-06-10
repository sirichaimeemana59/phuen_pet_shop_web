@extends('home.home_user')
@section('content')
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.store.title') !!}</h3>
                    </div>
                    <div class="panel-body search-form">
                        {!! Form::model($store,array('url' => array('employee/company_store/edit/file'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                        <div class="form-group row">
                            <input type="hidden" class="property_id" value="{!! $store['id'] !!}">
                            <input type="hidden" class="dis" name="dis" value="{!! $store['districts'] !!}">
                            <input type="hidden" class="subdis" name="subdis" value="{!! $store['subdistricts'] !!}">
                            <input type="hidden" class="pro" name="pro" value="{!! $store['province'] !!}">
                            <lable class="col-sm-2 control-label">{!! trans('messages.store.name_th') !!}</lable>
                            <div class="col-sm-4">
                                <input type="hidden" name="id" value="{!! $store->id !!}">
                                {!! Form::text('name_th',null,array('class'=>'form-control','placeholder'=>trans('messages.store.name_th'),'required')) !!}
                            </div>

                            <lable class="col-sm-2 control-label">{!! trans('messages.store.name_en') !!}</lable>
                            <div class="col-sm-4">
                                {!! Form::text('name_en',null,array('class'=>'form-control','placeholder'=>trans('messages.store.name_en'),'required')) !!}
                            </div>

                        </div>

                        <div class="form-group row">
                            <lable class="col-sm-2 control-label">{!! trans('messages.store.tell') !!}</lable>
                            <div class="col-sm-4">
                                {!! Form::text('tell',null,array('class'=>'form-control','placeholder'=>trans('messages.store.tell'),'required')) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <lable class="col-sm-2 control-label">{!! trans('messages.store.tax') !!}</lable>
                            <div class="col-sm-4">
                                {!! Form::text('tax_id',null,array('class'=>'form-control','placeholder'=>trans('messages.store.tax'),'required')) !!}
                            </div>

                            <lable class="col-sm-2 control-label">{!! trans('messages.store.mail') !!}</lable>
                            <div class="col-sm-4">
                                {!! Form::text('email',null,array('class'=>'form-control','placeholder'=>trans('messages.store.mail'),'required')) !!}
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 control-label">{{ trans('messages.AboutProp.province') }}</label>
                            <div class="col-sm-4">
                                {!! Form::select('province',$provinces,null,array('class'=>'form-control province','required')) !!}
                            </div>

                            <label class="col-sm-2 control-label">{{ trans('messages.AboutProp.district') }}</label>
                            <div class="col-sm-4">
                                {!! Form::select('district',$districts,null,array('class'=>'form-control district','required')) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 control-label">{{ trans('messages.AboutProp.subdistricts') }}</label>
                            <div class="col-sm-4">
                                {!! Form::select('sub_district',$subdistricts,null,array('class'=>'form-control subdistricts','required')) !!}
                            </div>

                            <label class="col-sm-2 control-label">{{ trans('messages.AboutProp.postcode') }}</label>
                            <div class="col-sm-4">
                                {!! Form::text('post_code',null,array('class'=>'form-control postcode','maxlength' => 10, 'placeholder'=> trans('messages.AboutProp.postcode'),'required')) !!}
                            </div>
                        </div>

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
        </div>
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

            @if(!empty($property))
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
                    url : "/root/admin/select/district",
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
                    url : "/root/admin/select/subdistrict",
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        $('.subdistricts').html('');
                        $.each($.parseJSON(e),function(i,val){
                            $('.subdistricts').append("<option value='"+val.id+"'>"+val.name_th+" "+val.name_en+"</option>");
                            // $('.postcode').val(val.zip_code);
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
                    url : "/root/admin/select/district/edit",
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        $('.district').html('');
                        $('.district').append("<option value=''>ตำบล</option>");
                        $.each($.parseJSON(e),function(i,val){
                            if(val.id == dis){
                                select = "selected";
                                $('.district').append("<option value='"+val.id+"' selected='"+select+"'>"+val.name_th+" "+val.name_en+"</option>");
                                // $('.postcode').val(val.zip_code);
                            }else {
                                select = "";
                                $('.district').append("<option value='"+val.id+"'>"+val.name_th+" "+val.name_en+"</option>");
                            }
                            //console.log(select);
                            // $('.postcode').val(val.zip_code);
                            //console.log(val.id);
                        });
                    },error : function(){
                        console.log('aa');
                    }
                })
                ////////////////////////////////
                $.ajax({
                    url : "/root/admin/select/editSubDis",
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
                    url : "/root/admin/select/subdistrict",
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
                    url : "/root/admin/select/zip_code",
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