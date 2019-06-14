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
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <a href="{!! url('/report/widden/'.$widen->id) !!}" target="_blank"><button class="btn btn-primary mt-2 mt-xl-0 text-right"><i class="fa fa-print"></i>  {!! trans('messages.report.print') !!}</button></a>
                            </div>
                        </div>
                        <br>
                        <div class="panel-body" id="landing-subject-list">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>{!! trans('messages.number') !!}</th>
                                        <th>{!! trans('messages.product.product_id') !!}</th>
                                        <th>{!! trans('messages.product.name_') !!}</th>
                                        <th>{!! trans('messages.product.amount') !!}</th>
                                        <th>{!! trans('messages.product.unit_id') !!}</th>
                                    </tr>
                            @foreach($widen_transection as $key => $w)
                                        <tr>
                                            <td>{!! $key+1 !!}</td>
                                            <td>{!! $w->product_id !!}</td>
                                            <td>{!! $w->join_product{'name_'.Session::get('locale')} !!}</td>
                                            <td>{!! $w->amount_widden !!}</td>
                                            <td>{!! $w->join_unit_transection['name_th'] !!}</td>
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

        });
    </script>
@endsection