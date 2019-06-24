<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="panel panel-default" id="panel-lead-list">
                    <div class="panel-body show" id="landing-subject-list">
                        <div class="table-responsive show_">
                            {!! Form::model(null,array('url' => array('/employee/save/income'),'class'=>'form-horizontal form_add create-store-form','id'=>'form_add','method'=>'post','enctype'=>'multipart/form-data')) !!}
                            <table class="table itemTables1" style="width: 100%">
                                <tr>
                                    <th ></th>
                                    <th>{!! trans('messages.number') !!}</th>
                                    <th>{!! trans('messages.finance.code') !!}</th>
                                    <th>{!! trans('messages.finance.total') !!}</th>
                                    <th>{!! trans('messages.finance.date') !!}</th>
                                </tr>
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
            <div class="card-body">
                <div class="panel panel-default" id="panel-lead-list">
                    <div class="panel-body show" id="landing-subject-list">
                        <div class="table-responsive show_">
                            <table class="table" style="width: 100%">
                                <tr>
                                    <td style="text-align: right; font-weight: bold;" colspan="2">{!! trans('messages.total') !!}</td>
                                    <td style="text-align: right;"><input type="text" name="income" class="income form-control" readonly><span class="income_"></span></td>
                                    <td>{!! trans('messages.payment.bath') !!}</td>
                                </tr>
                            </table>
                            <div class="panel-body float-right" id="landing-subject-list">
                                <button class="btn-info btn-primary" id="add-store-btn" type="submit">Save</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>