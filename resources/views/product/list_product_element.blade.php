@if($product->count() > 0)
    <?php
    $to   	= $product->total() - (($product->currentPage())*$product->perPage());
    $to     = ($to > 0) ? $to : 1;
    $from   = $product->total() - (($product->currentPage())*$product->perPage())+$product->perPage();
    $allpage = $product->lastPage();
    ?>
    <div class="row">
        <div class="col-md-6">
            <div class="dataTables_info" id="example-1_info" role="status" aria-live="polite">
                {!! trans('messages.showing',['from'=>$from,'to'=>$to,'total'=>$product->total()]) !!}<br/><br/>
            </div>
        </div>
        @if($allpage > 1)
            <div class="col-md-6 text-right">
                <div class="dataTables_paginate paging_simple_numbers" >
                    @if($product->currentPage() > 1)
                        <a class="btn btn-white p-paginate-link paginate-link" href="#" data-page="{{ $product->currentPage()-1 }}">{{ trans('messages.prev') }}</a>
                    @endif
                    @if($product->lastPage() > 1)
                        <?php echo Form::selectRange('page', 1, $product->lastPage(),$product->currentPage(),['class'=>'form-control p-paginate-select paginate-select']); ?>
                    @endif
                    @if($product->hasMorePages())
                        <a class="btn btn-white p-paginate-link paginate-link" href="#" data-page="{{ $product->currentPage()+1 }}">{{ trans('messages.next') }}</a>
                    @endif
                </div>
            </div>
        @endif
    </div>

    <div class="w3-hide-small">
    <div class="table-responsive table-striped">
    <table cellspacing="0" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>{!! trans('messages.number') !!}</th>
            <th>{!! trans('messages.unit.name') !!}</th>
            <th>{!! trans('messages.product.amount_unit') !!}</th>
            <th>{!! trans('messages.product.price') !!}</th>
            <th>{!! trans('messages.unit.title') !!}</th>
            <th>{!! trans('messages.action') !!}</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($product))
            @foreach($product as $key => $row)
                <tr>
                    <td>{!! $key+1 !!}</td>
                    <td> {!! $row->join_stock{'name_'.Session::get('locale')} !!}</td>
                    <td>{!! number_format($row->join_widen_trans['amount_widden']) !!}
                        @if(!empty($row->join_stock_log)){!! $row->join_stock_log{'name_'.Session::get('locale')} !!} @else {!! $row->join_unit_transection_all{'name_'.Session::get('locale')} !!} @endif
                    </td>
                    <td>@if(!empty($row->price_pack)){!! $row->price_pack !!} @else {!! $row->price_piece !!} @endif</td>
                    <td>@if(!empty($row->join_stock_log)){!! $row->join_stock_log{'name_'.Session::get('locale')} !!} @else {!! $row->join_unit_transection_all{'name_'.Session::get('locale')} !!} @endif</td>
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
    </div>
    </div>
    <br>
    <did class="hide">
        <div class="table-responsive table-striped">
            <table cellspacing="0" class="table table-bordered table-striped">
                <thead>
                <tr>
                    {{--<th>{!! trans('messages.number') !!}</th>--}}
                    <th>{!! trans('messages.unit.name') !!}</th>
                    <th>{!! trans('messages.product.amount_unit') !!}</th>
                    {{--<th>{!! trans('messages.product.price') !!}</th>--}}
                    {{--<th>{!! trans('messages.unit.title') !!}</th>--}}
                    <th>{!! trans('messages.action') !!}</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($product))
                    @foreach($product as $key => $row)
                        <tr>
                            {{--<td>{!! $key+1 !!}</td>--}}
                            <td> {!! $row->join_stock{'name_'.Session::get('locale')} !!}</td>
                            <td>{!! number_format($row->join_widen_trans['amount_widden']) !!}
                                @if(!empty($row->join_stock_log)){!! $row->join_stock_log{'name_'.Session::get('locale')} !!} @else {!! $row->join_unit_transection_all{'name_'.Session::get('locale')} !!} @endif
                            </td>
                            {{--<td>@if(!empty($row->price_pack)){!! $row->price_pack !!} @else {!! $row->price_piece !!} @endif</td>--}}
                            {{--<td>@if(!empty($row->join_stock_log)){!! $row->join_stock_log{'name_'.Session::get('locale')} !!} @else {!! $row->join_unit_transection_all{'name_'.Session::get('locale')} !!} @endif</td>--}}
                            <td>
                                {{--<button class="btn btn-primary mt-2 mt-xl-0 text-right view-store" data-id="{!! $row->id !!}"><i class="mdi mdi-eye"></i></button>--}}
                                {{--<button class="btn btn-warning mt-2 mt-xl-0 text-right edit-store" data-id="{!! $row->id !!}"><i class="mdi mdi-tooltip-edit"></i></button>--}}
                                {{--<button class="btn btn-danger mt-2 mt-xl-0 text-right delete-store" data-id="{!! $row->id !!}"><i class="mdi mdi-delete-sweep"></i></button>--}}
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown">{!! trans('messages.action') !!}
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li class="#"><a href="#" class="view-store" data-id="{!! $row->id !!}">{!! trans('messages.view') !!}</a></li>
                                        <li class="#"><a href="#" class="edit-store" data-id="{!! $row->id !!}">{!! trans('messages.edit') !!}</a></li>
                                        <li><a href="#" class="delete-store" data-id="{!! $row->id !!}">{!! trans('messages.delete') !!}</a></li>
                                    </ul>
                                </div>
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
        </div>
    </did>
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="dataTables_info" id="example-1_info" role="status" aria-live="polite">
                {!! trans('messages.showing',['from'=>$from,'to'=>$to,'total'=>$product->total()]) !!}
            </div>
        </div>
        @if($allpage > 1)
            <div class="col-md-6 text-right">
                <div class="dataTables_paginate paging_simple_numbers" >
                    @if($product->currentPage() > 1)
                        <a class="btn btn-white p-paginate-link paginate-link" href="#" data-page="{{ $product->currentPage()-1 }}">{{ trans('messages.prev') }}</a>
                    @endif
                    @if($product->lastPage() > 1)
                        <?php echo Form::selectRange('page', 1, $product->lastPage(),$product->currentPage(),['class'=>'form-control p-paginate-select paginate-select']); ?>
                    @endif
                    @if($product->hasMorePages())
                        <a class="btn btn-white p-paginate-link paginate-link" href="#" data-page="{{ $product->currentPage()+1 }}">{{ trans('messages.next') }}</a>
                    @endif
                </div>
            </div>
        @endif
    </div>
@else
    <div class="col-sm-12 text-center">ไม่พบข้อมูล</div><div class="clearfix"></div>
@endif
