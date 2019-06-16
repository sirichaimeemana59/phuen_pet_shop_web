@extends('home.home_user')
@section('content')
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.analyze.analyze') !!}</h3>
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
                            {!! Form::model(null,array('url' => array('employee/analyze/add'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                            <div class="form-group row">
                                <lable class="col-sm-2 control-label">{!! trans('messages.analyze.name_th') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::text('name_th',null,array('class'=>'form-control','placeholder'=>trans('messages.analyze.name_th'),'required')) !!}
                                </div>

                                <lable class="col-sm-2 control-label">{!! trans('messages.analyze.name_en') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::text('name_en',null,array('class'=>'form-control','placeholder'=>trans('messages.analyze.name_en'))) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <lable class="col-sm-2 control-label">{!! trans('messages.analyze.detail_th') !!}</lable>
                                <div class="col-sm-10">
                                    {!! Form::textarea('detail_th',null,['class'=>'form-control', 'rows' => 4, 'cols' => 40],'required') !!}                                    </div>
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
                                <div class="col-sm-12">
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
                        '<td><input type="text" class="amount form-control" name=data['+time+'][sick_th] required></td>',
                        '<td><input type="text" class="amount form-control" name=data['+time+'][sick_en]></td>',
                        '<td><input type="text" class="amount form-control" name=data['+time+'][detail_th] required></td>',
                        '<td><input type="text" class="amount form-control" name=data['+time+'][detail_en]></td>',
                        '<td><a class="btn btn-danger delete-subject"><i class="mdi mdi-delete-sweep"></i></a></td>',
                        '</tr>'].join('');
                    $('.itemTables').append(data);
                });
            });


        });
    </script>
@endsection