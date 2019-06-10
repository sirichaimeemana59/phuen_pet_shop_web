@if($store->count() > 0)
    <?php
    $to   	= $store->total() - (($store->currentPage())*$store->perPage());
    $to     = ($to > 0) ? $to : 1;
    $from   = $store->total() - (($store->currentPage())*$store->perPage())+$store->perPage();
    $allpage = $store->lastPage();
    ?>
    <div class="row">
        <div class="col-md-6">
            <div class="dataTables_info" id="example-1_info" role="status" aria-live="polite">
                {!! trans('messages.showing',['from'=>$from,'to'=>$to,'total'=>$store->total()]) !!}<br/><br/>
            </div>
        </div>
        @if($allpage > 1)
            <div class="col-md-6 text-right">
                <div class="dataTables_paginate paging_simple_numbers" >
                    @if($store->currentPage() > 1)
                        <a class="btn btn-white p-paginate-link paginate-link" href="#" data-page="{{ $store->currentPage()-1 }}">{{ trans('messages.prev') }}</a>
                    @endif
                    @if($store->lastPage() > 1)
                        <?php echo Form::selectRange('page', 1, $store->lastPage(),$store->currentPage(),['class'=>'form-control p-paginate-select paginate-select']); ?>
                    @endif
                    @if($store->hasMorePages())
                        <a class="btn btn-white p-paginate-link paginate-link" href="#" data-page="{{ $store->currentPage()+1 }}">{{ trans('messages.next') }}</a>
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
            <th>{!! trans('messages.store.title') !!}</th>
            <th>{!! trans('messages.store.tell') !!}</th>
            <th>{!! trans('messages.store.mail') !!}</th>
            <th>{!! trans('messages.store.tax') !!}</th>
            <th>{!! trans('messages.action') !!}</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $day = array(
                0 => trans('messages.day.Monday'),
                1 => trans('messages.day.Tuesday'),
                2 => trans('messages.day.Wednesday'),
                3 => trans('messages.day.Thursday'),
                4 => trans('messages.day.Friday'),
                5 => trans('messages.day.Saturday'),
                6 => trans('messages.day.Sunday')
            );

        $start = array(
            0 => '08:30',
            1 => '09:20',
            2 => '10:15',
            3 => '11:05',
            4 => '11:55',
            5 => '12:45',
            6 => '13:35',
            7 => '14:30',
            8 => '15:20',
            9 => '16:10',
            10 => '17:00',
            11 => '18:10'
        );

        $stop = array(
            0 => "09:20",
            1 => "10:10",
            2 => "11:05",
            3 => "11:55",
            4 => "12:45",
            5 => "13:35",
            6 => "14:30",
            7 => "15:20",
            8 => "16:10",
            9 => "17:00",
            10 => "17:50",
            11 => "19:50"
        );
        ?>
        @if(!empty($store))
            @foreach($store as $key => $row)
                <tr>
                    <td>{!! $key+1 !!}</td>
                    <td> {!! $row->{'name_'.Session::get('locale')}!!}</td>
                    <td>{!! $row->tell !!}</td>
                    <td>{!! $row->email!!}</td>
                    <td>{!! $row->tax_id!!}</td>
                    <td>
                        <button class="btn btn-primary mt-2 mt-xl-0 text-right view-store" data-id="{!! $row->id !!}"><i class="mdi mdi-eye"></i></button>
                        <a href="{!! url('employee/update_store_form/'.$row->id) !!}"><button class="btn btn-warning mt-2 mt-xl-0 text-right"><i class="mdi mdi-tooltip-edit"></i></button></a>
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
                {!! trans('messages.showing',['from'=>$from,'to'=>$to,'total'=>$store->total()]) !!}
            </div>
        </div>
        @if($allpage > 1)
            <div class="col-md-6 text-right">
                <div class="dataTables_paginate paging_simple_numbers" >
                    @if($store->currentPage() > 1)
                        <a class="btn btn-white p-paginate-link paginate-link" href="#" data-page="{{ $store->currentPage()-1 }}">{{ trans('messages.prev') }}</a>
                    @endif
                    @if($store->lastPage() > 1)
                        <?php echo Form::selectRange('page', 1, $store->lastPage(),$store->currentPage(),['class'=>'form-control p-paginate-select paginate-select']); ?>
                    @endif
                    @if($store->hasMorePages())
                        <a class="btn btn-white p-paginate-link paginate-link" href="#" data-page="{{ $store->currentPage()+1 }}">{{ trans('messages.next') }}</a>
                    @endif
                </div>
            </div>
        @endif
    </div>
@else
    <div class="col-sm-12 text-center">ไม่พบข้อมูล</div><div class="clearfix"></div>
@endif
