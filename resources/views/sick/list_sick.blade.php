@extends('home.home_user')
@section('content')
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.analyze.analyze') !!}</h3>
                    </div>
                    <div class="panel-body search-form">
                        <form method="POST" id="search-form" action="#" accept-charset="UTF-8" class="form-horizontal">
                            <div class="row">
                                <div class="col-sm-3 block-input">
                                    <input class="form-control" size="25" placeholder="{!! trans('messages.analyze.name') !!}" name="name">
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
                        <h3 class="panel-title">{!! trans('messages.analyze.analyze') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="row w3-hide-small">
                            <div class="col-sm-12 text-right">
                                <a href="{!! url('/employee/sick/form') !!}"><button class="btn btn-warning mt-2 mt-xl-0 text-right"><i class="fa fa-archive"></i>  {!! trans('messages.analyze.disease_name') !!}</button></a>
                                <a href="{!! url('/employee/report/pet') !!}" target="_blank"><button class="btn btn-success mt-2 mt-xl-0 text-right"><i class="fa fa-file-text"></i>  {!! trans('messages.report_show') !!}</button></a>
                            </div>
                        </div>
                        <br>
                        <div class="panel-body" id="landing-subject-list">
                            @include('sick.list_sick_element')
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
                    <h4 class="modal-title" style="color: #bbbfc3;">{!! trans('messages.analyze.disease_name') !!}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form">
                                {!! Form::model(null,array('url' => array('employee/analyze/add'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.analyze.name_th') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::text('name_th',null,array('class'=>'form-control','placeholder'=>trans('messages.analyze.name_th'),'required')) !!}
                                    </div>

                                    <lable class="col-sm-2 control-label">{!! trans('messages.analyze.name_en') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::text('name_en',null,array('class'=>'form-control','placeholder'=>trans('messages.analyze.name_en'),'required')) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.analyze.detail_th') !!}</lable>
                                    <div class="col-sm-10">
                                        {!! Form::textarea('detail_th',null,['class'=>'form-control', 'rows' => 4, 'cols' => 40]) !!}                                    </div>
                                    {{--</div>--}}
                                </div>

                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.analyze.detail_en') !!}</lable>
                                    <div class="col-sm-10">
                                        {!! Form::textarea('detail_en',null,['class'=>'form-control', 'rows' => 4, 'cols' => 40]) !!}                                    </div>
                                    {{--</div>--}}
                                </div>

                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.analyze.syndrome') !!}</lable>
                                    <button class="btn-success btn-sm sick_add float-right" type="button"><li class="fa fa-plus-circle"></li> {!! trans('messages.analyze.syndrome') !!}</button>
                                    <div class="col-sm-10">
                                        <table class="table itemTables" style="width: 100%">
                                            <tr>
                                                <th ></th>
                                                <th>{!! trans('messages.analyze.syndrome_th') !!}</th>
                                                <th>{!! trans('messages.analyze.syndrome_en') !!}</th>
                                                <th>{!! trans('messages.analyze.detail_th') !!}</th>
                                                <th>{!! trans('messages.analyze.detail_en') !!}</th>
                                                <th>{!! trans('messages.action') !!}</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>


                                <div class="form-group row float-right" style="text-align: center; ">
                                    <div class="col-sm-12">
                                        <button class="btn-info btn-primary" id="add-store-btn" type="submit">{!! trans('messages.save') !!}</button>
                                        <button class="btn-info btn-warning" type="reset">{!! trans('messages.reset') !!}</button>
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
                    <h4 class="modal-title" style="color: #bbbfc3;">{!! trans('messages.pet.title') !!}</h4>
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
                    <h4 class="modal-title" style="color: #bbbfc3;">{!! trans('messages.pet.title') !!}</h4>
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

            $('.add-store').on('click', function () {
                $('#add-store').modal('show');
            });

            $('.search-store').on('click', function () {
                //alert('aa');
                propertyPage(1);
            });

            $('body').on('click', '.p-paginate-link', function (e) {
                e.preventDefault();
                propertyPage($(this).attr('data-page'));
                //alert('aa');
            });

            $('body').on('change', '.p-paginate-select', function (e) {
                e.preventDefault();
                propertyPage($(this).val());
            });

            function propertyPage(page) {
                        // $('.search-store').on('click', function () {
                var data = $('#search-form').serialize()+'&page='+page;
                //alert('aa');
                console.log(data);
                $('#landing-subject-list').css('opacity', '0.6');
                $.ajax({
                    url: $('#root-url').val() + '/employee/sick/list_show_sick',
                    method: 'post',
                    dataType: 'html',
                    data: data,
                    success: function (e) {
                        $('#landing-subject-list').css('opacity', '1').html(e);
                    }, error: function () {
                        console.log('Error Search Data Store');
                    }
                });
            // });
        }

            $('.reset-s-btn').on('click',function () {
                $(this).closest('form').find("input").val("");
                $(this).closest('form').find("select option:selected").removeAttr('selected');
                //propertyPageSale (1);
                window.location.href =$('#root-url').val()+'/employee/sick/list_show_sick';
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
                    url : $('#root-url').val()+'/employee/sick/view',
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        $('#lead-content').html(e);
                        $('.v-loading').hide();
                    } ,error : function(){
                        console.log('Error View Data Sick');
                    }
                });
            });

            $('.edit-store').on('click',function(){
                var id = $(this).data('id');
                console.log(id);
                $('#edit-store').modal('show');
                $('#lead-content1').empty();
                $('.v-loading1').show();
                $.ajax({
                    url : $('#root-url').val()+'/employee/pet/edit',
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
                            $.post($('#root-url').val()+"/employee/pet/delete", {
                                id: id
                            }, function(e) {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                }).then(function(){
                                    window.location.href =$('#root-url').val()+'/employee/pet/show_pet'
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
                    url : $('#root-url').val()+'/employee/add/product/for_sale',
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

            $('.itemTables').on("click", '.delete-subject', function() {
                //alert('aaa');
                $(this).closest('tr.itemRow').remove();
                //return false;
            });

            $(function () {
                $('.sick_add').on('click', function (e){
                    e.preventDefault();
                    var time = $.now();

                    var data = [
                        '<tr class="itemRow">',
                        '<td></td>',
                        '<td></td>',
                        '<td><input type="text" class="amount form-control" name=data['+time+'][amount] readonly></td>',
                        '<td><select name="data['+time+'][unit_trance]" class="unit_trance form-control" style="width:300px;" required></select></td>',
                        // '<td><input type="text" class="amount_ amount_unit form-control" name=data['+time+'][amount_] readonly></td>',
                        '<td><select name="data['+time+'][unit_widen]" class="unit_widen form-control" style="width:300px;" required></select></td>',
                        '<td><input type="hidden" class="name"><input type="hidden" class="form-control product_code" name=data['+time+'][product_code] readonly>' +
                        '<input type="hidden" class="form-control id_product_stock" name=data['+time+'][id_product_stock] readonly><select name="data['+time+'][amount_widden]" class="amount_widden form-control" style="width:300px;" required></select></td>',
                        '<td><a class="btn btn-danger delete-subject"><i class="mdi mdi-delete-sweep"></i></a></td>',
                        '</tr>'].join('');
                    $('.itemTables').append(data);
                });
            });


        });
    </script>
@endsection
