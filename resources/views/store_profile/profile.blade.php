@extends('home.home_user')
@section('content')
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.store_profile.title') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="panel-body" id="landing-subject-list">
                            <div class="form">
                                @if(!empty($profile))
                                    {!! Form::model($profile,array('url' => array('employee/store_profile/update'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                                    <input type="hidden" name="id" value="{!! $profile->id !!}">
                                    <input type="hidden" name="photo_top_" value="{!! $profile->photo_top !!}">
                                    <input type="hidden" name="photo_center_" value="{!! $profile->photo_center !!}">
                                    <input type="hidden" name="photo_foot_" value="{!! $profile->photo_foot !!}">
                                    <input type="hidden" name="photo_logo_" value="{!! $profile->photo_logo !!}">
                                @else
                                    {!! Form::model(null,array('url' => array('employee/store_profile/add'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                                @endif
                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.pet.name_th') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::text('name_th',null,array('class'=>'form-control','placeholder'=>trans('messages.pet.name_th'),'required')) !!}
                                    </div>

                                    <lable class="col-sm-2 control-label">{!! trans('messages.pet.name_en') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::text('name_en',null,array('class'=>'form-control','placeholder'=>trans('messages.pet.name_en'),'required')) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.store_profile.tell') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::text('tell',null,array('class'=>'form-control','placeholder'=>trans('messages.store_profile.tell'),'required')) !!}
                                    </div>

                                    <lable class="col-sm-2 control-label">{!! trans('messages.store_profile.email') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::text('email',null,array('class'=>'form-control','placeholder'=>trans('messages.store_profile.email'),'required')) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.store_profile.photo_top') !!}
                                        <br>    <p style="color: red;font-weight: bold;">{!! trans('messages.store_profile.size') !!} : 1920 X 800</p></lable>
                                    <div class="col-sm-4">
                                        {!! Form::file('photo_top',null,array('class'=>'form-control','placeholder'=>trans('messages.store_profile.photo_top'))) !!}
                                    </div>

                                    <lable class="col-sm-2 control-label">{!! trans('messages.store_profile.photo_center') !!}
                                        <br>    <p style="color: red;font-weight: bold;">{!! trans('messages.store_profile.size') !!} : 1920 X 290</p></lable>
                                    <div class="col-sm-4">
                                        {!! Form::file('photo_center',null,array('class'=>'form-control','placeholder'=>trans('messages.store_profile.photo_center'))) !!}
                                    </div>
                                </div>
                                    <div class="form-group row">
                                        <lable class="col-sm-2 control-label">{!! trans('messages.store_profile.photo_foot') !!}
                                            <br>    <p style="color: red;font-weight: bold;">{!! trans('messages.store_profile.size') !!} : 1920 X 450</p></lable>
                                        <div class="col-sm-4">
                                            {!! Form::file('photo_foot',null,array('class'=>'form-control','placeholder'=>trans('messages.store_profile.photo_foot'))) !!}
                                        </div>

                                        <lable class="col-sm-2 control-label">{!! trans('messages.store_profile.logo') !!}
                                            <br>    <p style="color: red;font-weight: bold;">{!! trans('messages.store_profile.size') !!} : 178 X 43</p></lable>
                                        <div class="col-sm-4">
                                            {!! Form::file('photo_logo',null,array('class'=>'form-control','placeholder'=>trans('messages.store_profile.logo'))) !!}
                                        </div>
                                    </div>

                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.store_profile.address') !!}</lable>
                                    <div class="col-sm-10">
                                        {!! Form::textarea('address',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40,'required']) !!}
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
                        </div>
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

            $('.add-store').on('click',function(){
                $('#add-store').modal('show');
            });

            $('.search-store').on('click',function(){
                var data  = $('#search-form').serialize();
                //alert('aa');
                console.log(data);
                $('#landing-subject-list').css('opacity','0.6');
                $.ajax({
                    url : '/employee/pet/show_pet',
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
                window.location.href ='/employee/product/list_product';
            });

            $('#add-store-btn').on('click',function () {
                if($('.create-store-form').valid()) {
                    $(this).attr('disabled','disabled').prepend('<i class="fa-spin fa-spinner" style="color: red;"></i> ');
                    $('.create-store-form').submit();
                }
            });


            $('body').on('click','.view-store',function(){
                var id = $(this).data('id');
                //console.log(id);
                $('#view-store').modal('show');
                $('#lead-content').empty();
                $('.v-loading').show();
                $.ajax({
                    url : '/employee/pet/view',
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        $('#lead-content').html(e);
                        $('.v-loading').hide();
                    } ,error : function(){
                        console.log('Error View Data Pet');
                    }
                });
            });

            $('body').on('click','.edit-store',function(){
                var id = $(this).data('id');
                console.log(id);
                $('#edit-store').modal('show');
                $('#lead-content1').empty();
                $('.v-loading1').show();
                $.ajax({
                    url : '/employee/pet/edit',
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        $('#lead-content1').html(e);
                        $('.v-loading1').hide();
                    } ,error : function(){
                        console.log('Error View Data Pet');
                    }
                });
            });

            $('body').on('click','.delete-store',function(){
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
                            $.post("/employee/pet/delete", {
                                id: id
                            }, function(e) {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                }).then(function(){
                                    window.location.href ='/employee/pet/show_pet'
                                });
                            });
                        }, 50);
                    } else {
                        swal("Your imaginary file is safe!");
            }
            });
            });

            $('body').on('change','.select_product',function(){
                var id = $(this).val();

                //console.log(id);
                $.ajax({
                    url : '/employee/add/product/for_sale',
                    method : 'post',
                    dataType : 'json',
                    data : ({'id':id}),
                    success : function(e){
                        var amount = e.amount;
                        var price = e.price;
                        var psc = e.psc;
                        var unit_id = e.unit_id;

                        //console.log(unit_id);
                        $('.price').val(price);
                        $('.amount').val(amount);

                        $('.unit_id').html('');
                        $('.unit_id').append("<option value=''>unit_id</option>");

                        if(e.unit_id == '1'){
                            var select1 = "selected";
                            var select2 = "";
                        }else {
                            var select2 = "selected";
                            var select1 = "";
                        }

                        $('.psc').hide();

                        if(psc > 0){
                            $('.psc').show();
                            $('.psc_total').val(psc);
                        }
                        $('.unit_id').append("<option value='1' "+select1+">Box</option>",
                            "<option value='2' "+select2+">Piece</option>");
                    } ,error : function(){
                        console.log('Error View Data Product');
                    }
                });
            });

            $('body').on('change','.type_sale',function(){
                var id = $(this).val();

                if(id == 1){
                    $('.price_pack').show();
                    $('.price_piece').hide();
                }else{
                    $('.price_piece').show();
                    $('.price_pack').hide();
                }
                //console.log(id);
            });

        });
    </script>
@endsection