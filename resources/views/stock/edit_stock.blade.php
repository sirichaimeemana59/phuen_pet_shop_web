@extends('home.home_user')
@section('content')
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.stock.title') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="panel-body" id="landing-subject-list">
                            <div class="form-group row">
                                <lable class="col-sm-2 control-label"></lable>
                                <div class="col-sm-10">
                                    <img src="{!! asset($stock->photo) !!}" alt="" width="50%">
                                </div>
                                
                            </div>
                            {!! Form::model($stock,array('url' => array('/employee/product/update_to_stock'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                            <div class="form-group row">
                                <input type="hidden" name="id" value="{!! $stock->id !!}">
                                <input type="hidden" name="code_" value="{!! $stock->code !!}">
                                <input type="hidden" name="photo_" value="{!! $stock->photo !!}">
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

                            <div class="form-group row">
                                <lable class="col-sm-2 control-label">{!! trans('messages.unit.title') !!}</lable>
                                <div class="col-sm-10">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th width="*"></th>
                                                <th>{!! trans('messages.unit.name_th') !!}</th>
                                                <th>{!! trans('messages.unit.name_en') !!}</th>
                                                <th>{!! trans('messages.unit.amount_unit') !!}</th>
                                                <th>{!! trans('messages.action') !!}</th>
                                            </tr>

                                            <tr>
                                                <td>{!! trans('messages.unit.unit_small') !!}</td>
                                                <input type="hidden" name="stock_log" value="{!! $stock_log->id !!}">
                                                <td><input type="text" name="name_unit_th" class="form-control name_th" required value="{!! $stock_log->name_th !!}"></td>
                                                <td><input type="text" name="name_unit_en" class="form-control name_en" required value="{!! $stock_log->name_en !!}"></td>
                                                <td><input type="text" name="amount1" class="form-control num" readonly value="{!! $stock_log->amount !!}"></td>
                                            </tr>

                                            @foreach($unit_ as $key => $val)
                                                <tr>
                                                    <td></td>
                                                    <td><input type="text" name="data_[{!!$key !!}][name_th]" class="form-control" value="{!! $val->name_th !!}">
                                                        <input type="hidden" name="data_[{!!$key !!}][id_unit]" value="{!! $val->id !!}">
                                                        <input type="hidden" name="data_[{!!$key !!}][code]" value="{!! $val->code !!}"></td>
                                                    <td><input type="text" name="data_[{!!$key !!}][name_en]" class="form-control" value="{!! $val->name_en !!}"></td>
                                                    <td><input type="text" name="data_[{!!$key !!}][amount]" class="form-control num" value="{!! $val->amount !!}"></td>
                                                    <td><button class="btn btn-danger mt-2 mt-xl-0 text-right delete-store" data-ids="{!! $stock->id !!}" data-id="{!! $val->id !!}"><i class="mdi mdi-delete-sweep"></i></button></td>
                                                </tr>
                                            @endforeach

                                            @for($i=1;$i<=4-count($unit_);$i++)
                                                <tr>
                                                    <td></td>
                                                    <td><input type="text" name="data[{!!$i !!}][name_th]" class="form-control"></td>
                                                    <td><input type="text" name="data[{!!$i !!}][name_en]" class="form-control"></td>
                                                    <td><input type="text" name="data[{!!$i !!}][amount]" class="form-control num"></td>
                                                </tr>
                                            @endfor
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row float-right" style="text-align: center; ">
                        <div class="col-sm-12">
                            <button class="btn-info btn-primary" id="add-store-btn" type="submit">Save</button>
                            <button class="btn-info btn-warning" type="reset">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
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

            $('#add-store-btn').on('click',function () {
                if($('.create-store-form').valid()) {
                    $(this).attr('disabled','disabled').prepend('<i class="fa-spin fa-spinner" style="color: red;"></i> ');
                    $('.create-store-form').submit();
                }
            });

            $(".num").on("keypress" , function (e) {

                var code = e.keyCode ? e.keyCode : e.which;

                if(code > 57){
                    return false;
                }else if(code < 48 && code != 8){
                    return false;
                }

            });

            $('.delete-store').on('click',function(){
                var id = $(this).data('id');
                var ids = $(this).data('ids');

                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete)=> {
                    if (willDelete) {
                        setTimeout(function() {
                            $.post("/employee/stock/delete/unit", {
                                id: id
                            }, function(e) {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                }).then(function(){
                                    window.location.href ='/employee/stock/edit/5'
                                });
                            });
                        }, 50);
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });return false;
            });
        });
    </script>
@endsection