{{--<nav class="sidebar sidebar-offcanvas" id="sidebar">--}}
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{!! url('/user/create_profile') !!}">
                <i class="fa fa-user menu-icon"></i>
                <span class="menu-title">{!! trans('messages.profile.title') !!}</span>
            </a>
        </li>
        <li class="nav-item w3-hide-small">
            <a class="nav-link" href="{!! url('/employee/store_profile') !!}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">{!! trans('messages.store_profile.title') !!}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{!! url('/employee/product/list_product') !!}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">{!! trans('messages.product.head_product') !!}</span>
            </a>
        </li>
        @if(Auth::user()->role = 2)
            <li class="nav-item hide">
                <a class="nav-link" href="{!! url('/approved/user_check') !!}">
                    <i class="mdi mdi-account menu-icon"></i>
                    <span class="menu-title">{!! trans('messages.user.title') !!}</span>
                </a>
            </li>
        @endif
        <li class="nav-item w3-hide-small">
            <a class="nav-link" href="{!! url('/approved/user_check') !!}">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">{!! trans('messages.user.title') !!}</span>
            </a>
        </li>
        {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="{!! url('/employee/company_store') !!}">--}}
                {{--<i class="fa fa-archive menu-icon"></i>--}}
                {{--<span class="menu-title">{!! trans('messages.store.title') !!}</span>--}}
            {{--</a>--}}
        {{--</li>--}}
        <li class="nav-item w3-hide-small">
            <a class="nav-link" data-toggle="collapse" href="#authj" aria-expanded="false" aria-controls="authj">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">{!! trans('messages.store.title') !!}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="authj">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{!! url('/employee/company_store') !!}"> {!! trans('messages.store.title') !!} </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{!! url('/employee/company_store/order_company') !!}"> {!! trans('messages.store.order') !!} </a></li>
                </ul>
            </div>
        </li>
        {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="{!! url('/employee/unit_store') !!}">--}}
                {{--<i class="fa fa-list-ul menu-icon"></i>--}}
                {{--<span class="menu-title">{!! trans('messages.unit.title') !!}</span>--}}
            {{--</a>--}}
        {{--</li>--}}
        <li class="nav-item w3-hide-small">
            <a class="nav-link" href="{!! url('/employee/sell/order_product_sell') !!}">
                <i class="fa fa-sellsy menu-icon"></i>
                <span class="menu-title">{!! trans('messages.sell.title') !!}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{!! url('/employee/stock/product_stock') !!}">
                <i class="fa fa-archive menu-icon"></i>
                <span class="menu-title">{!! trans('messages.stock.title') !!}</span>
            </a>
        </li>
        <li class="nav-item w3-hide-small">
            <a class="nav-link" href="{!! url('/employee/quotation/order_quotation_list') !!}">
                <i class="fa fa-file menu-icon"></i>
                <span class="menu-title">{!! trans('messages.quotation.title') !!}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{!! url('/employee/pet/show_pet') !!}">
                <i class="fa fa-paw menu-icon"></i>
                <span class="menu-title">{!! trans('messages.pet.title') !!}</span>
            </a>
        </li>
        @if(Auth::user()->role = 2)
        <li class="nav-item hide">
            <a class="nav-link" href="{!! url('/employee/sick/list_show_sick') !!}">
                <i class="fa fa-paw menu-icon"></i>
                <span class="menu-title">{!! trans('messages.analyze.analyze') !!}</span>
            </a>
        </li>
        @endif
        <li class="nav-item w3-hide-small">
            <a class="nav-link" href="{!! url('/employee/sick/list_show_sick') !!}">
                <i class="fa fa-paw menu-icon"></i>
                <span class="menu-title">{!! trans('messages.analyze.analyze') !!}</span>
            </a>
        </li>
        <li class="nav-item w3-hide-small">
            <a class="nav-link" href="{!! url('/employee/category') !!}">
                <i class="fa fa-database menu-icon" aria-hidden="true" ></i>
                <span class="menu-title">{!! trans('messages.category.title') !!}</span>
            </a>
        </li>
        <li class="nav-item w3-hide-small">
            <a class="nav-link" href="{!! url('/employee/driver') !!}">
                <i class="fa fa-car menu-icon" aria-hidden="true" ></i>
                <span class="menu-title">{!! trans('messages.driver.driver') !!}</span>
            </a>
        </li>
        {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="{!! url('/employee/group/list') !!}">--}}
                {{--<i class="fa fa-database menu-icon" aria-hidden="true" ></i>--}}
                {{--<span class="menu-title">{!! trans('messages.group.title') !!}</span>--}}
            {{--</a>--}}
        {{--</li>--}}
        <li class="nav-item">
            <a class="nav-link" href="{!! url('/employee/list_order_customer') !!}">
                <i class="fa fa-database menu-icon" aria-hidden="true" ></i>
                <span class="menu-title">{!! trans('messages.order.order') !!}</span>
            </a>
        </li>
        @if(Auth::user()->role = 2)
            <li class="nav-item hide">
                <a class="nav-link" href="{!! url('/customer/news') !!}">
                    <i class="fa fa-newspaper-o menu-icon"></i>
                    <span class="menu-title">{!! trans('messages.news.title') !!}</span>
                </a>
            </li>
        @endif
        <li class="nav-item w3-hide-small">
            <a class="nav-link" href="{!! url('/customer/news') !!}">
                <i class="fa fa-newspaper-o menu-icon"></i>
                <span class="menu-title">{!! trans('messages.news.title') !!}</span>
            </a>
        </li>
        @if(Auth::user()->role = 2)
            <li class="nav-item hide">
                <a class="nav-link" href="{!! url('/employee/list/comment') !!}">
                    <i class="fa fa-commenting menu-icon"></i>
                    <span class="menu-title">{!! trans('messages.comment.title') !!}</span>
                </a>
            </li>
        @endif
        <li class="nav-item w3-hide-small">
            <a class="nav-link" href="{!! url('/employee/list/comment') !!}">
                <i class="fa fa-commenting menu-icon"></i>
                <span class="menu-title">{!! trans('messages.comment.title') !!}</span>
            </a>
        </li>
        @if(Auth::user()->role = 2)
            <li class="nav-item hide">
                <a class="nav-link" href="{!! url('/employee/list/promotion') !!}">
                    <i class="fa fa-money menu-icon"></i>
                    <span class="menu-title">{!! trans('messages.promotion.title') !!}</span>
                </a>
            </li>
        @endif
        <li class="nav-item w3-hide-small">
            <a class="nav-link" href="{!! url('/employee/list/promotion') !!}">
                <i class="fa fa-money menu-icon"></i>
                <span class="menu-title">{!! trans('messages.promotion.title') !!}</span>
            </a>
        </li>
        @if(Auth::user()->role = 2)
            <li class="nav-item hide">
                <a class="nav-link" href="{!! url('/employee/list/know') !!}">
                    <i class="fa fa-lightbulb-o menu-icon"></i>
                    <span class="menu-title">{!! trans('messages.know.title') !!}</span>
                </a>
            </li>
        @endif
        <li class="nav-item w3-hide-small">
            <a class="nav-link" href="{!! url('/employee/list/know') !!}">
                <i class="fa fa-lightbulb-o menu-icon"></i>
                <span class="menu-title">{!! trans('messages.know.title') !!}</span>
            </a>
        </li>
        {{--<li class="nav-item w3-hide-small">--}}
            {{--<a class="nav-link" data-toggle="collapse" href="#auth_" aria-expanded="false" aria-controls="auth_">--}}
                {{--<i class="mdi mdi-account menu-icon"></i>--}}
                {{--<span class="menu-title">{!! trans('messages.finance.title') !!}</span>--}}
                {{--<i class="menu-arrow"></i>--}}
            {{--</a>--}}
            {{--<div class="collapse" id="auth_">--}}
                {{--<ul class="nav flex-column sub-menu">--}}
                    {{--<li class="nav-item"> <a class="nav-link" href="{!! url('employee/list_income') !!}"> {!! trans('messages.finance.incomes') !!} </a></li>--}}
                    {{--<li class="nav-item"> <a class="nav-link" href="{!! url('employee/list_expenditure') !!}"> {!! trans('messages.expenditure.title') !!} </a></li>--}}
                    {{--<li class="nav-item"> <a class="nav-link" href="{!! url('employee/list_expenditure/report') !!}"> {!! trans('messages.expenditure.title_') !!} </a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</li>--}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">{!! trans('messages.report.title') !!}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{!! url('widen/list_element') !!}"> {!! trans('messages.report.report_widen') !!} </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{!! url('report/sale_good') !!}"> {!! trans('messages.sale_good.title') !!} </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{!! url('report/inventory') !!}">{!! trans('messages.sale_good.inventory') !!}</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{!! url('report/sale_report') !!}">{!! trans('messages.sale') !!}</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{!! url('add/document') !!}">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">{!! trans('messages.doc') !!}</span>
            </a>
        </li>
    </ul>
{{--</nav>--}}
