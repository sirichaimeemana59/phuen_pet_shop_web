@if($widden_product->count() > 0)
    <?php
    $to   	= $widden_product->total() - (($widden_product->currentPage())*$widden_product->perPage());
    $to     = ($to > 0) ? $to : 1;
    $from   = $widden_product->total() - (($widden_product->currentPage())*$widden_product->perPage())+$widden_product->perPage();
    $allpage = $widden_product->lastPage();
    ?>
    <div class="row">
        <div class="col-md-6">
            <div class="dataTables_info" id="example-1_info" role="status" aria-live="polite">
                {!! trans('messages.showing',['from'=>$from,'to'=>$to,'total'=>$widden_product->total()]) !!}<br/><br/>
            </div>
        </div>
        @if($allpage > 1)
            <div class="col-md-6 text-right">
                <div class="dataTables_paginate paging_simple_numbers" >
                    @if($widden_product->currentPage() > 1)
                        <a class="btn btn-white p-paginate-link paginate-link" href="#" data-page="{{ $product->currentPage()-1 }}">{{ trans('messages.prev') }}</a>
                    @endif
                    @if($widden_product->lastPage() > 1)
                        <?php echo Form::selectRange('page', 1, $widden_product->lastPage(),$widden_product->currentPage(),['class'=>'form-control p-paginate-select paginate-select']); ?>
                    @endif
                    @if($widden_product->hasMorePages())
                        <a class="btn btn-white p-paginate-link paginate-link" href="#" data-page="{{ $product->currentPage()+1 }}">{{ trans('messages.next') }}</a>
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
            <th>{!! trans('messages.report.id_widen') !!}</th>
            <th>{!! trans('messages.report.user') !!}</th>
            <th>{!! trans('messages.report.date') !!}</th>
            <th>{!! trans('messages.action') !!}</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($widden_product))
            @foreach($widden_product as $key => $row)
                <tr>
                    <td>{!! $key+1 !!}</td>
                    <td>{!! $row->code !!}</td>
                    <td>@if(!empty($row->user_id)){!! $row->user_id !!} @else - @endif</td>
                    <td>{!! localDate($row->date) !!}</td>
                    <td>
                        <a href="{!! url('/employee/detail/widen/'.$row->id) !!}"><button class="btn btn-primary mt-2 mt-xl-0 text-right"><i class="mdi mdi-eye"></i></button></a>
                        <a href="{!! url('/employee/product/edit/'.$row->id) !!}"><button class="btn btn-warning mt-2 mt-xl-0 text-right"><i class="mdi mdi-tooltip-edit"></i></button></a>
                        <button class="btn btn-danger mt-2 mt-xl-0 text-right delete-store" data-id="{!! $row->id !!}"><i class="mdi mdi-delete-sweep"></i></button>
                        <a href="{!! url('/employee/print/widen/'.$row->id) !!}"><button class="btn btn-success mt-2 mt-xl-0 text-right"><i class="mdi mdi-printer"></i></button></a>
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
                {!! trans('messages.showing',['from'=>$from,'to'=>$to,'total'=>$widden_product->total()]) !!}
            </div>
        </div>
        @if($allpage > 1)
            <div class="col-md-6 text-right">
                <div class="dataTables_paginate paging_simple_numbers" >
                    @if($widden_product->currentPage() > 1)
                        <a class="btn btn-white p-paginate-link paginate-link" href="#" data-page="{{ $product->currentPage()-1 }}">{{ trans('messages.prev') }}</a>
                    @endif
                    @if($widden_product->lastPage() > 1)
                        <?php echo Form::selectRange('page', 1, $widden_product->lastPage(),$widden_product->currentPage(),['class'=>'form-control p-paginate-select paginate-select']); ?>
                    @endif
                    @if($widden_product->hasMorePages())
                        <a class="btn btn-white p-paginate-link paginate-link" href="#" data-page="{{ $product->currentPage()+1 }}">{{ trans('messages.next') }}</a>
                    @endif
                </div>
            </div>
        @endif
    </div>
@else
    <div class="col-sm-12 text-center">ไม่พบข้อมูล</div><div class="clearfix"></div>
@endif
