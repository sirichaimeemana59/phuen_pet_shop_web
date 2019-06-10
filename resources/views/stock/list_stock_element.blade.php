@if($company->count() > 0)
    <?php
    $to   	= $company->total() - (($company->currentPage())*$company->perPage());
    $to     = ($to > 0) ? $to : 1;
    $from   = $company->total() - (($company->currentPage())*$company->perPage())+$company->perPage();
    $allpage = $company->lastPage();
    ?>
    <div class="row">
        <div class="col-md-6">
            <div class="dataTables_info" id="example-1_info" role="status" aria-live="polite">
                {!! trans('messages.showing',['from'=>$from,'to'=>$to,'total'=>$company->total()]) !!}<br/><br/>
            </div>
        </div>
        @if($allpage > 1)
            <div class="col-md-6 text-right">
                <div class="dataTables_paginate paging_simple_numbers" >
                    @if($company->currentPage() > 1)
                        <a class="btn btn-white p-paginate-link paginate-link" href="#" data-page="{{ $company->currentPage()-1 }}">{{ trans('messages.prev') }}</a>
                    @endif
                    @if($company->lastPage() > 1)
                        <?php echo Form::selectRange('page', 1, $company->lastPage(),$company->currentPage(),['class'=>'form-control p-paginate-select paginate-select']); ?>
                    @endif
                    @if($company->hasMorePages())
                        <a class="btn btn-white p-paginate-link paginate-link" href="#" data-page="{{ $company->currentPage()+1 }}">{{ trans('messages.next') }}</a>
                    @endif
                </div>
            </div>
        @endif
    </div>

    {{--<div class="table-responsive table-striped">--}}
    <table cellspacing="0" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>{!! trans('messages.number') !!}</th>
            <th>{!! trans('messages.unit.name') !!}</th>
            <th>{!! trans('messages.product.amount') !!}</th>
            <th>{!! trans('messages.unit.title') !!}</th>
            <th>{!! trans('messages.product.price') !!}</th>
            <th>{!! trans('messages.action') !!}</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($company))
            @foreach($company as $key => $row)
                <tr>
                    <td>{!! $key+1 !!}</td>
                    <td> {!! $row->{'name_'.Session::get('locale')} !!}</td>
                    <td>{!! $row->amount !!}</td>
                    <td>{!! $row->join_unit{'name_'.Session::get('locale')}!!}</td>
                    <td>{!! $row->price!!}</td>
                    <td>
                        <button class="btn btn-primary mt-2 mt-xl-0 text-right view-store" data-id="{!! $row->id !!}"><i class="mdi mdi-eye"></i></button>
                        <button class="btn btn-warning mt-2 mt-xl-0 text-right edit-store" data-id="{!! $row->id !!}"><i class="mdi mdi-tooltip-edit"></i></button>
                        <button class="btn btn-danger mt-2 mt-xl-0 text-right delete-store" data-id="{!! $row->id !!}"><i class="mdi mdi-delete-sweep"></i></button>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td>{!! trans('messages.no-data') !!}</td>
            </tr>

        @endif
        </tbody>
    </table>
    {{--</div>--}}
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="dataTables_info" id="example-1_info" role="status" aria-live="polite">
                {!! trans('messages.showing',['from'=>$from,'to'=>$to,'total'=>$company->total()]) !!}
            </div>
        </div>
        @if($allpage > 1)
            <div class="col-md-6 text-right">
                <div class="dataTables_paginate paging_simple_numbers" >
                    @if($company->currentPage() > 1)
                        <a class="btn btn-white p-paginate-link paginate-link" href="#" data-page="{{ $company->currentPage()-1 }}">{{ trans('messages.prev') }}</a>
                    @endif
                    @if($company->lastPage() > 1)
                        <?php echo Form::selectRange('page', 1, $company->lastPage(),$company->currentPage(),['class'=>'form-control p-paginate-select paginate-select']); ?>
                    @endif
                    @if($company->hasMorePages())
                        <a class="btn btn-white p-paginate-link paginate-link" href="#" data-page="{{ $company->currentPage()+1 }}">{{ trans('messages.next') }}</a>
                    @endif
                </div>
            </div>
        @endif
    </div>
@else
    <div class="col-sm-12 text-center">ไม่พบข้อมูล</div><div class="clearfix"></div>
@endif