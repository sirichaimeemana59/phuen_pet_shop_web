@extends('home.home_user')
@section('content')
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.category.title') !!}</h3>
                    </div>
                    <div class="panel-body search-form">
                        <form method="POST" id="search-form" action="#" accept-charset="UTF-8" class="form-horizontal">
                            <div class="row">
                                <lable class="col-sm-10 control-label"></lable>
                                <div class="col-sm-12">
                                    <select name="" id="" style="width: 100%;">
                                        <option value="">{!! trans('messages.selete_cat') !!}</option>
                                        @foreach($p_row as $key => $row)
                                            <option value="{!! $row->id !!}">{!! $row{'name_'.Session::get('locale')} !!}</option>
                                        @endforeach
                                    </select>
                                </div>


                                {{--<div class="col-sm-3 block-input">--}}
                                {{--<input class="form-control" size="25" placeholder="{!! trans('messages.id') !!}" name="id">--}}
                                {{--</div>--}}
                            </div> <br>

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
                        <h3 class="panel-title">{!! trans('messages.pet.title') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="panel-body" id="landing-subject-list">
                            @include('customer.list_order_element')
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
                    url : '/customer/home',
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
                window.location.href ='/customer/home';
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
                    url : '/customer/pet/view',
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

            $('.edit-store').on('click',function(){
                var id = $(this).data('id');
                console.log(id);
                $('#edit-store').modal('show');
                $('#lead-content1').empty();
                $('.v-loading1').show();
                $.ajax({
                    url : '/customer/pet/edit',
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
                            $.post("/customer/pet/delete", {
                                id: id
                            }, function(e) {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                }).then(function(){
                                    window.location.href ='/customer/home'
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

            $(".num").on("keypress" , function (e) {

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