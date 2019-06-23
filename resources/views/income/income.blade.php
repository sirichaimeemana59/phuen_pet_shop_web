@extends('home.home_user')
@section('content')
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.finance.income') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="panel-body" id="landing-subject-list">
                            <form method="POST" id="search-form" action="#" accept-charset="UTF-8" class="form-horizontal">
                                <div class="row">
                                    <lable class="col-sm-2 control-label"></lable>
                                    <div class="col-sm-3 block-input">
                                        <input class="form-control" type="date" size="25" placeholder="{!! trans('messages.date') !!}" name="date">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <lable class="col-sm-2 control-label">{!! trans('messages.to') !!}</lable>
                                    <div class="col-sm-3 block-input">
                                        <input class="form-control" type="date" size="25" placeholder="{!! trans('messages.date') !!}" name="date_to">
                                    </div>

                                    <lable class="col-sm-2 control-label">{!! trans('messages.go') !!}</lable>
                                    <div class="col-sm-3 block-input">
                                        <input class="form-control" type="date" size="25" placeholder="{!! trans('messages.date') !!}" name="date_go">
                                    </div>
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
    </div>
    <br>
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="panel-body" id="landing-subject-list">
                           @include('income.income_element')
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

            $('.show').hide();
            $('.search-store').on('click',function(){
                var data  = $('#search-form').serialize();
                //alert('aa');
                console.log(data);
                $('#landing-subject-list').css('opacity','0.6');
                $.ajax({
                    url : '/employee/list_income',
                    method : 'post',
                    dataType : 'html',
                    data : data,
                    success : function(e){
                        $('.show').show();
                        $('#landing-subject-list').css('opacity','1').html(e);
                    } ,error : function(){
                        console.log('Error Search Data Store');
                    }
                });
            });
        });
    </script>
@endsection