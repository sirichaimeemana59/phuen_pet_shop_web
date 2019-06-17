@extends('home.home_user')
@section('content')
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.widen.title') !!} : {!! $widen->code !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        {!! Form::model(null,array('url' => array('/employee/product/add'),'class'=>'form-horizontal form_add','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}

                        <div class="panel-body" id="landing-subject-list">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>{!! trans('messages.number') !!}</th>
                                        <th>{!! trans('messages.product.product_id') !!}</th>
                                        <th>{!! trans('messages.product.name_') !!}</th>
                                        <th>{!! trans('messages.product.amount_unit') !!}</th>
                                        <th>{!! trans('messages.product.unit_id') !!}</th>
                                        <th>{!! trans('messages.product.unit_sale') !!}</th>
                                        <th>{!! trans('messages.product.price') !!}</th>
                                    </tr>
                            @foreach($widen_transection as $key => $w)
                                        <input type="hidden" name="code" value="{!! $w->code !!}">
                                        <tr>
                                            <td><input type="hidden" name="data[{!! $key !!}][product_id]" value="{!! $w->id_product_stock !!}" class="form-control">{!! $key+1 !!}</td>
                                            <td><input type="hidden" name="data[{!! $key !!}][unit_id]" value="{!! $w->unit_widden !!}" class="form-control">{!! $w->product_id !!}</td>
                                            <td>{!! $w->join_product{'name_'.Session::get('locale')} !!}</td>
                                            <td>{!! number_format($w->amount_widden,0) !!}  {!! $w->join_stock->join_stock_log{'name_'.Session::get('locale')} !!}</td>
                                            <td>{!! $w->amount_widden / ($w->join_unit_transection['amount_unit']/$w->join_unit_transection['amount']) !!} : {!! $w->join_unit_transection['name_th'] !!}</td>
                                            <td>
                                                <select name="data[{!! $key !!}][unit_sale]" id="">
                                                    <option value="">{!! trans('messages.select_unit') !!}</option>
                                                    <option value="{!! $w->join_stock_log['id'] !!}">{!! $w->join_stock_log{'name_'.Session::get('locale')} !!}</option>
                                                    @foreach($w->join_unit_transection_all as $t)
                                                        <option value="{!! $t['id'] !!}">{!! $t{'name_'.Session::get('locale')} !!}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input type="text" name="data[{!! $key !!}][price]" class="form-control num" required></td>
                                        </tr>
                            @endforeach
                                </table>
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
                <div class="card-body text-right">
                    <div class="panel panel-default" id="panel-lead-list">
                        <button class="btn-primary btn-lg payment_" type="submit"><li class="fa fa-plus-circle" aria-hidden="true"></li> {!! trans('messages.product.head_product') !!}</button>
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

            $('.payment_').on('click', function () {
                if($("#form_add").valid()) {
                    $(this).attr('disabled','disabled').prepend('<i class="fa-spin fa-spinner"></i> ');
                    $("#form_add").submit();
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

        });
    </script>
@endsection