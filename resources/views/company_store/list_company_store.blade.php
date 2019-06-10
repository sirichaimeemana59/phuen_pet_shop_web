@extends('home.home_user')
@section('content')
    {{--{!! Session::get('locale') !!}--}}
    {{-- //search --}}
    @if(!empty($text))
        <div class="alert alert-danger">
            <strong>{!! trans('messages.waring_regis') !!}</strong> {!! trans('messages.danger_regis') !!}
        </div>
        @endif
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.store.title') !!}</h3>
                    </div>
                    <div class="panel-body search-form">
                        <form method="POST" id="search-form" action="#" accept-charset="UTF-8" class="form-horizontal">
                            <div class="row">
                                <div class="col-sm-3 block-input">
                                    <input class="form-control" size="25" placeholder="{!! trans('messages.store.title') !!}" name="name">
                                </div>

                                {{--<div class="col-sm-3 block-input">--}}
                                {{--<input class="form-control" size="25" placeholder="{!! trans('messages.id') !!}" name="id">--}}
                                {{--</div>--}}
                            </div>

                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button type="reset" class="btn btn-white reset-s-btn">{!! trans('messages.reset') !!}</button>
                                    <button type="button" class="btn btn-secondary search-store">{!! trans('messages.search') !!}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- //search --}}
    <br>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.store.title') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <button class="btn btn-primary mt-2 mt-xl-0 text-right add-store"><i class="fa fa-archive"></i>  {!! trans('messages.store.title') !!}</button>
                            </div>
                        </div>
                        <br>
                        <div class="panel-body" id="landing-subject-list">
                            @include('company_store.list_company_store_element')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal add store-->
    <div class="modal fade" id="add-store" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #9BA2AB;">
                    <h4 class="modal-title" style="color: #bbbfc3;">{!! trans('messages.store.title') !!}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form">
                                {!! Form::model(null,array('url' => array('employee/company_store/add'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.store.name') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::text('name',null,array('class'=>'form-control','placeholder'=>trans('messages.store.name'),'required')) !!}
                                    </div>

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
                                    <lable class="col-sm-2 control-label">{!! trans('messages.store.address') !!}</lable>
                                    <div class="col-sm-10">
                                        {!! Form::textarea('address',null,array('class'=>'form-control','placeholder'=>trans('messages.store.address'),'required')) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">{{ trans('messages.AboutProp.province') }}</label>
                                    <div class="col-sm-4">
                                        {!! Form::select('province',$provinces,null,array('class'=>'form-control province')) !!}
                                    </div>

                                    <label class="col-sm-2 control-label">{{ trans('messages.AboutProp.district') }}</label>
                                    <div class="col-sm-4">
                                        {!! Form::select('district',$districts,null,array('class'=>'form-control district')) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">{{ trans('messages.AboutProp.subdistricts') }}</label>
                                    <div class="col-sm-4">
                                        {!! Form::select('sub_district',$subdistricts,null,array('class'=>'form-control subdistricts')) !!}
                                    </div>

                                    <label class="col-sm-2 control-label">{{ trans('messages.AboutProp.postcode') }}</label>
                                    <div class="col-sm-4">
                                        {!! Form::text('postcode',null,array('class'=>'form-control postcode','maxlength' => 10, 'placeholder'=> trans('messages.AboutProp.postcode'))) !!}
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- End Modal add store-->

    <!-- Modal view store-->
    <div class="modal fade" id="view-store" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #9BA2AB;">
                    <h4 class="modal-title" style="color: #bbbfc3;">{!! trans('messages.store.title') !!}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="lead-content" class="form">

                            </div>
                        </div>
                    </div>
                    <span class="v-loading">กำลังค้นหาข้อมูล...</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- End Modal view store-->

    <!-- Modal edit Store-->
    <div class="modal fade" id="edit-store" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #9BA2AB;">
                    <h4 class="modal-title" style="color: #bbbfc3;">{!! trans('messages.store.title') !!}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="lead-content1" class="form">

                            </div>
                        </div>
                    </div>
                    <span class="v-loading1">กำลังค้นหาข้อมูล...</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- End Modal edit Store-->
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

            $('.add-store').on('click',function(){
                $('#add-store').modal('show');
            });

            $('.search-store').on('click',function(){
                var data  = $('#search-form').serialize();
                //alert('aa');
                //console.log(data);
                $('#landing-subject-list').css('opacity','0.6');
                $.ajax({
                    url : '/employee/company_store',
                    method : 'post',
                    dataType : 'html',
                    data : data,
                    success : function(e){
                        $('#landing-subject-list').css('opacity','1').html(e);
                    } ,error : function(){
                        console.log('Error Search Data Store');
                    }
                });
            });

            $('.reset-s-btn').on('click',function () {
                $(this).closest('form').find("input").val("");
                $(this).closest('form').find("select option:selected").removeAttr('selected');
                //propertyPageSale (1);
                window.location.href ='/employee/company_store';
            });

            $('#add-store-btn').on('click',function () {
                if($('.create-store-form').valid()) {
                    $(this).attr('disabled','disabled').prepend('<i class="fa-spin fa-spinner" style="color: red;"></i> ');
                    $('.create-store-form').submit();
                }
            });

            $('.view-store').on('click',function(){
                var id = $(this).data('id');
                //console.log(id);
                $('#view-store').modal('show');
                $('#lead-content').empty();
                $('.v-loading').show();
                $.ajax({
                    url : '/employee/company_store/view',
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        $('#lead-content').html(e);
                        $('.v-loading').hide();
                    } ,error : function(){
                        console.log('Error View Data Store');
                    }
                });
            });

            $('.edit-store').on('click',function(){
                var id = $(this).data('id');
                //console.log(id);
                $('#edit-store').modal('show');
                $('#lead-content1').empty();
                $('.v-loading1').show();
                $.ajax({
                    url : '/employee/company_store/edit',
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        $('#lead-content1').html(e);
                        $('.v-loading1').hide();
                    } ,error : function(){
                        console.log('Error View Data Store');
                    }
                });
            });

            $('.delete-store').on('click',function(){
                var id = $(this).data('id');
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete)=> {
                    if (willDelete) {
                        setTimeout(function() {
                            $.post("/employee/company_store/delete", {
                                id: id
                            }, function(e) {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                }).then(function(){
                                    window.location.href ='/employee/company_store'
                                });
                            });
                        }, 50);
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
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
                    url : $('#root-url').val()+"/root/admin/select/district",
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
                    url : $('#root-url').val()+"/root/admin/select/district/edit",
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
                    url : $('#root-url').val()+"/root/admin/select/editSubDis",
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
                    url : $('#root-url').val()+"/root/admin/select/subdistrict",
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
                    url : $('#root-url').val()+"/root/admin/select/zip_code",
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