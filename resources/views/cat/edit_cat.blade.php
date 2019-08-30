@extends('home.home_user')
@section('content')
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.group.title') !!}</h3>
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
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="panel-body" id="landing-subject-list">
                            {!! Form::model($cat,array('url' => array('employee/cat/update'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                            <div class="form-group row">
                                <lable class="col-sm-10 control-label"><h3>{!! trans('messages.group.title') !!}</h3></lable>
                            </div>

                            <input type="hidden" name="id_cat" value="{!! $cat->id !!}">
                            <div class="form-group row">
                                <lable class="col-sm-2 control-label">{!! trans('messages.category.name_th') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::text('name_th',null,array('class'=>'form-control','placeholder'=>trans('messages.category.name_th'),'required')) !!}
                                </div>

                                <lable class="col-sm-2 control-label">{!! trans('messages.category.name_en') !!}</lable>
                                <div class="col-sm-4">
                                    {!! Form::text('name_en',null,array('class'=>'form-control','placeholder'=>trans('messages.category.name_en'),'required')) !!}
                                </div>
                            </div>


                            <div class="form-group row">
                                <lable class="col-sm-10 control-label"><h3>{!! trans('messages.category.title') !!}</h3></lable>
                            </div>

                            <div class="form-group row">
                                <table class="table itemTables" style="width: 100%">
                                    <tr>
                                        <th width="20%"><button class="btn-primary btn-sm add_cat" type="submit"><li class="fa fa-archive"></li> {!! trans('messages.category.title') !!}</button></th>
                                        <th>{!! trans('messages.category.name_th') !!}</th>
                                        <th>{!! trans('messages.category.name_en') !!}</th>
                                        <th>{!! trans('messages.action') !!}</th>
                                    </tr>
                                    @foreach($cat->join_cat as $key => $t)
                                        <tr>
                                            <td><input type="hidden" name="data_[{!! $key !!}][id]" value="{!! $t['id'] !!}"></td>
                                            <td><input type="text" class="form-control" name="data_[{!! $key !!}][name_th]" value="{!! $t['name_th'] !!}"></td>
                                            <td><input type="text" class="form-control" name="data_[{!! $key !!}][name_en]" value="{!! $t['name_en'] !!}"></td>
                                            <td><a class="btn btn-danger delete-store" data-id="{!! $t['id'] !!}" data-ids="{!! $cat->id !!}"><i class="mdi mdi-delete-sweep"></i></a></td>
                                        </tr>
                                    @endforeach
                                </table>
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

            $(function () {
                $('.add_cat').on('click', function (e){
                    e.preventDefault();
                    var time = $.now();
                    var data = [
                        '<tr class="itemRow">',
                        '<td></td>',
                        '<td><input type="text" class="form-control" name=data['+time+'][name_th] required></td>',
                        '<td><input type="text" class="form-control" name=data['+time+'][name_en] required></td>',
                        '<td><a class="btn btn-danger delete-subject"><i class="mdi mdi-delete-sweep"></i></a></td>',
                        '</tr>'].join('');
                    $('.itemTables').append(data);
                });
            });

            $('.itemTables').on("click", '.delete-subject', function() {
                //alert('aaa');
                $(this).closest('tr.itemRow').remove();
                //return false;
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
                            $.post($('#root-url').val()+"/employee/cat/delete_cat_tran", {
                                id: id
                            }, function(e) {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                }).then(function(){
                                    window.location.href ='/employee/cat/edit/'+ids
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