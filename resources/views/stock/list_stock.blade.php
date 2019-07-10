@extends('home.home_user')
@section('content')
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.stock.title') !!}</h3>
                    </div>
                    <div class="panel-body search-form">
                        <form method="POST" id="search-form" action="#" accept-charset="UTF-8" class="form-horizontal">
                            <div class="row">
                                <div class="col-sm-3 block-input">
                                    <input class="form-control" size="25" placeholder="{!! trans('messages.stock.title') !!}" name="name">
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
                        <h3 class="panel-title">{!! trans('messages.stock.title') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="row w3-hide-small">
                            <div class="col-sm-12 text-right">
                                <a href="{!! url('employee/add_product_stock') !!}"><button class="btn btn-primary mt-2 mt-xl-0 text-right"><i class="fa fa-archive"></i>  {!! trans('messages.stock.title') !!}</button></a>
                            </div>
                        </div>
                        <br>
                        <div class="panel-body" id="landing-subject-list">
                            @include('stock.list_stock_element')
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
                    <h4 class="modal-title" style="color: #bbbfc3;">{!! trans('messages.product.head_product') !!}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form">
                                {!! Form::model(null,array('url' => array('employee/product/add_to_stock'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.product.name_th') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::text('name_th',null,array('class'=>'form-control','placeholder'=>trans('messages.product.name_th'),'required')) !!}
                                    </div>

                                    <lable class="col-sm-2 control-label">{!! trans('messages.product.name_en') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::text('name_en',null,array('class'=>'form-control','placeholder'=>trans('messages.product.name_en'),'required')) !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.product.amount') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::text('amount',null,array('class'=>'form-control','placeholder'=>trans('messages.product.amount'),'required')) !!}
                                    </div>

                                    <lable class="col-sm-2 control-label">{!! trans('messages.product.unit_id') !!}</lable>
                                    <div class="col-sm-4">
                                        <select name="unit_id" id="" class="form-control select_unit">
                                            <option value="">{!! trans('messages.select_unit') !!}</option>
                                            <option value="1">Box</option>
                                            <option value="2">Piece</option>
                                            {{--@foreach($unit as $key => $val)--}}
                                            {{--<option value="{!! $val->id !!}">{!! $val->{'name_'.Session::get('locale')} !!}</option>--}}
                                            {{--@endforeach--}}
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.product.price') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::text('price',null,array('class'=>'form-control','placeholder'=>trans('messages.product.price'),'required')) !!}
                                    </div>

                                    <lable class="col-sm-2 control-label amount">{!! trans('messages.stock.Pcs') !!}</lable>
                                        <div class="col-sm-4 amount">
                                            {!! Form::text('psc',null,array('class'=>'form-control','placeholder'=>trans('messages.stock.Pcs'),'required')) !!}
                                        </div>
                                </div>

                                <div class="form-group row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.product.photo') !!}</lable>
                                    <div class="col-sm-4">
                                        {!! Form::file('photo',null,array('class'=>'form-control')) !!}
                                    </div>

                                   <lable class="col-sm-2 control-label">{!! trans('messages.store.title') !!}</lable>
                                    <div class="col-sm-4">
                                        <select name="store_id" id="" class="form-control">
                                            <option value="">{!! trans('messages.store.title') !!}</option>
                                            @foreach($company_ as $key => $val)
                                                <option value="{!! $val->id !!}">{!! $val->{'name_'.Session::get('locale')} !!}</option>
                                            @endforeach
                                        </select>
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
                    <h4 class="modal-title" style="color: #bbbfc3;">{!! trans('messages.product.head_product') !!}</h4>
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
                    <h4 class="modal-title" style="color: #bbbfc3;">{!! trans('messages.product.head_product') !!}</h4>
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
                    url : $('#root-url').val()+'/employee/stock/product',
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
                window.location.href =$('#root-url').val()+'/employee/stock/product';
            });

            $('#add-store-btn').on('click',function () {
                if($('.create-store-form').valid()) {
                    $(this).attr('disabled','disabled').prepend('<i class="fa-spin fa-spinner" style="color: red;"></i> ');
                    $('.create-store-form').submit();
                }
            });


            $('body').on('click','.view-store',function(){
                var id = $(this).data('id');
                $('#view-store').modal('show');
                $('#lead-content').empty();
                $('.v-loading').show();
                $.ajax({
                    url : $('#root-url').val()+'/employee/stock/view',
                    method : 'post',
                    dataType : 'html',
                    data : ({'id':id}),
                    success : function(e){
                        $('#lead-content').html(e);
                        $('.v-loading').hide();
                    } ,error : function(){
                        console.log('Error View Data Product');
                    }
                });
            });

            $('body').on('click','.edit-store',function(){
                var id = $(this).data('id');
                //console.log(id);
                $('#edit-store').modal('show');
                $('#lead-content1').empty();
                $('.v-loading1').show();
                $.ajax({
                    url : $('#root-url').val()+'/employee/stock/edit',
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
                            $.post($('#root-url').val()+"/employee/stock/delete", {
                                id: id
                            }, function(e) {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                }).then(function(){
                                    window.location.href ='/employee/stock/product'
                                });
                            });
                        }, 50);
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
            });

            $('.amount').hide();
            $('body').on('change','.select_unit',function(){
                var id = $(this).val();

                if(id == 1){
                    $('.amount').show();
                }else{
                    $('.amount').hide();
                }
            })
        });
    </script>
@endsection