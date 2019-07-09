@extends('home.home_user')
@section('content')

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>

    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                        <h3 class="panel-title">{!! trans('messages.doc') !!}</h3>
                    </div>
                    <div class="panel panel-default" id="panel-lead-list">
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <a href="{!! url('/doc/print') !!}" target="_blank"><button class="btn btn-success mt-2 mt-xl-0 text-right"><i class="fa fa-print"></i>  {!! trans('messages.report_show') !!}</button></a>
                            </div>
                        </div>
                        <br>
                        <div class="panel-body" id="landing-subject-list">
                            @if(!empty($doc))
                                {!! Form::model($doc,array('url' => array('update/doc'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                                <input type="hidden" name="id" value="{!! $doc->id !!}">
                            @else
                                {!! Form::model(null,array('url' => array('add/doc'),'class'=>'form-horizontal create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                            @endif
                        <div class="form-group row">
                            <div class="col-sm-12">
                                {!! Form::textarea('detail',null,['class'=>'form-control summernote', 'rows' => 100, 'cols' => 40]) !!}                                    </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
{{--<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">--}}
{{--<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>--}}
{{--<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>--}}


@section('script')
    {{--<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">--}}
    {{--<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>--}}

    <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/js/jquery-validate/jquery.validate.min.js"></script>

    <a href="http://!!asset('/assets/css/summernote.min.css')!!">http://!!asset('/assets/css/summernote.min.css')!!</a>
    <a href="http://!!asset('/assets/js/summernote.min.js')!!">http://!!asset('/assets/js/summernote.min.js')!!</a>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">

    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).ready(function() {
                $('.summernote').summernote();
                    height: 500;
            });

        });
    </script>
@endsection