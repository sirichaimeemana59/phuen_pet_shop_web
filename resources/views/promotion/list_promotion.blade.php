@extends('home.home_user')
@section('content')
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.promotion.title') !!}</h3>
                    </div>
                    <div class="panel-body search-form">
                        <form method="POST" id="search-form" action="#" accept-charset="UTF-8" class="form-horizontal">
                            <div class="row">
                                <div class="col-sm-3 block-input">
                                    <input class="form-control" size="25" placeholder="{!! trans('messages.promotion.name') !!}" name="name">
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
                        <h3 class="panel-title">{!! trans('messages.promotion.title') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="row w3-hide-small">
                            <div class="col-sm-12 text-right">
                                <button class="btn btn-primary mt-2 mt-xl-0 text-right add-store"><i class="fa fa-archive"></i>  {!! trans('messages.promotion.title') !!}</button>
                                {{--<a href="{!! url('/employee/report/pet') !!}" target="_blank"><button class="btn btn-success mt-2 mt-xl-0 text-right"><i class="fa fa-file-text"></i>  {!! trans('messages.report_show') !!}</button></a>--}}
                            </div>
                        </div>
                        <br>
                        <div class="panel-body" id="landing-subject-list">
                            @include('promotion.list_promotion_element')
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
                    <h4 class="modal-title" style="color: #bbbfc3;">{!! trans('messages.promotion.title') !!}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form">
                                {!! Form::model(null,array('url' => array('employee/promotion/add'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
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
                                    <lable class="col-sm-2 control-label">{!! trans('messages.promotion.detail_th') !!}</lable>
                                    <div class="col-sm-10">
                                        {!! Form::textarea('detail_th',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}                                    </div>
                                </div>

                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.promotion.detail_en') !!}</lable>
                                    <div class="col-sm-10">
                                        {!! Form::textarea('detail_en',null,['class'=>'form-control', 'rows' => 2, 'cols' => 40]) !!}                                    </div>
                                </div>


                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.promotion.discount') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::text('discount',null,array('class'=>'form-control num','placeholder'=>trans('messages.promotion.discount'),'required')) !!}
                                    </div>

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
                    <h4 class="modal-title" style="color: #bbbfc3;">{!! trans('messages.promotion.title') !!}</h4>
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
                    <h4 class="modal-title" style="color: #bbbfc3;">{!! trans('messages.promotion.title') !!}</h4>
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
                console.log(data);
                $('#landing-subject-list').css('opacity','0.6');
                $.ajax({
                    url : '/employee/list/promotion',
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
                window.location.href ='/employee/list/promotion';
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
                    url : '/employee/promotion/view',
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
                    url : '/employee/promotion/edit',
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
                            $.post("/employee/promotion/delete", {
                                id: id
                            }, function(e) {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                }).then(function(){
                                    window.location.href ='/employee/list/promotion'
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

            $("body").on("keypress",".num" , function (e) {

                var code = e.keyCode ? e.keyCode : e.which;

                if(code > 57){
                    return false;
                }else if(code < 48 && code != 8){
                    return false;
                }

            });

        });
    </script>
@endsection