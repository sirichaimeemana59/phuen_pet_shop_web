@if($p_row->count() > 0)
    <?php
    $to   	= $p_row->total() - (($p_row->currentPage())*$p_row->perPage());
    $to     = ($to > 0) ? $to : 1;
    $from   = $p_row->total() - (($p_row->currentPage())*$p_row->perPage())+$p_row->perPage();
    $allpage = $p_row->lastPage();
    ?>
    <div class="row">
        <div class="col-md-6">
            <div class="dataTables_info" id="example-1_info" role="status" aria-live="polite">
                {!! trans('messages.showing',['from'=>$from,'to'=>$to,'total'=>$p_row->total()]) !!}<br/><br/>
            </div>
        </div>
        @if($allpage > 1)
            <div class="col-md-6 text-right">
                <div class="dataTables_paginate paging_simple_numbers" >
                    @if($p_row->currentPage() > 1)
                        <a class="btn btn-white p-paginate-link paginate-link" href="#" data-page="{{ $product->currentPage()-1 }}">{{ trans('messages.prev') }}</a>
                    @endif
                    @if($p_row->lastPage() > 1)
                        <?php echo Form::selectRange('page', 1, $p_row->lastPage(),$p_row->currentPage(),['class'=>'form-control p-paginate-select paginate-select']); ?>
                    @endif
                    @if($p_row->hasMorePages())
                        <a class="btn btn-white p-paginate-link paginate-link" href="#" data-page="{{ $product->currentPage()+1 }}">{{ trans('messages.next') }}</a>
                    @endif
                </div>
            </div>
        @endif
    </div>

    <div class="table-responsive table-striped">
        <table cellspacing="0" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>{!! trans('messages.number') !!}</th>
                <th>{!! trans('messages.order.id') !!}</th>
                <th>{!! trans('messages.order.date') !!}</th>
                <th>{!! trans('messages.product.total') !!}</th>
                {{--<th>{!! trans('messages.action') !!}</th>--}}
            </tr>
            </thead>
            <tbody>
            @if(!empty($p_row))
                @foreach($p_row as $key => $row)
                    <tr>
                        <td>{!! $key+1 !!}</td>
                        <td>{!! $row->order_code !!}</td>
                        <td>{!! localDate($row->created_at) !!}</td>
                        <td>{!! $row->total !!}</td>
                        {{--<td>--}}
                            {{--<button class="btn btn-primary mt-2 mt-xl-0 text-right view-store" data-id="{!! $row->id !!}"><i class="mdi mdi-eye"></i></button>--}}
                            {{--<a href="{!! url('employee/edit/expenditure/'.$row->id) !!}"><button class="btn btn-warning mt-2 mt-xl-0 text-right"><i class="mdi mdi-tooltip-edit"></i></button></a>--}}
                            {{--<button class="btn btn-danger mt-2 mt-xl-0 text-right delete-store" data-id="{!! $row->id !!}"><i class="mdi mdi-delete-sweep"></i></button>--}}
                            {{--@if($row->status == 0 )--}}
                            {{--<button class="btn btn-success mt-2 mt-xl-0 text-right app-store" data-id="{!! $row->id !!}"><i class="fa fa-check-square"></i></button>--}}
                            {{--@endif--}}
                        {{--</td>--}}
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>{!! trans('messages.no-data') !!}</td>
                </tr>

            @endif
            </tbody>
        </table>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="dataTables_info" id="example-1_info" role="status" aria-live="polite">
                {!! trans('messages.showing',['from'=>$from,'to'=>$to,'total'=>$p_row->total()]) !!}
            </div>
        </div>
        @if($allpage > 1)
            <div class="col-md-6 text-right">
                <div class="dataTables_paginate paging_simple_numbers" >
                    @if($p_row->currentPage() > 1)
                        <a class="btn btn-white p-paginate-link paginate-link" href="#" data-page="{{ $product->currentPage()-1 }}">{{ trans('messages.prev') }}</a>
                    @endif
                    @if($p_row->lastPage() > 1)
                        <?php echo Form::selectRange('page', 1, $p_row->lastPage(),$p_row->currentPage(),['class'=>'form-control p-paginate-select paginate-select']); ?>
                    @endif
                    @if($p_row->hasMorePages())
                        <a class="btn btn-white p-paginate-link paginate-link" href="#" data-page="{{ $product->currentPage()+1 }}">{{ trans('messages.next') }}</a>
                    @endif
                </div>
            </div>
        @endif
    </div>
@else
    <div class="col-sm-12 text-center">ไม่พบข้อมูล</div><div class="clearfix"></div>
@endif
