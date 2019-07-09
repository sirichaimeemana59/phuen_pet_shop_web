<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item w3-hide-small">
            <a class="nav-link" href="{!! url('/employee/store_profile') !!}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">{!! trans('messages.store_profile.title') !!}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{!! url('/employee/product') !!}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">{!! trans('messages.product.head_product') !!}</span>
            </a>
        </li>
        @if(Auth::user()->role = 2)
            <li class="nav-item hide">
                <a class="nav-link" href="{!! url('/approved/user') !!}">
                    <i class="mdi mdi-account menu-icon"></i>
                    <span class="menu-title">{!! trans('messages.user.title') !!}</span>
                </a>
            </li>
        @endif
        <li class="nav-item w3-hide-small">
            <a class="nav-link" href="{!! url('/approved/user') !!}">
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
                    <li class="nav-item"> <a class="nav-link" href="{!! url('/employee/company_store/order') !!}"> {!! trans('messages.store.order') !!} </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
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
            <a class="nav-link" href="{!! url('/employee/sell/product') !!}">
                <i class="fa fa-sellsy menu-icon"></i>
                <span class="menu-title">{!! trans('messages.sell.title') !!}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{!! url('/employee/stock/product') !!}">
                <i class="fa fa-archive menu-icon"></i>
                <span class="menu-title">{!! trans('messages.stock.title') !!}</span>
            </a>
        </li>
        <li class="nav-item w3-hide-small">
            <a class="nav-link" href="{!! url('/employee/quotation/order') !!}">
                <i class="fa fa-file menu-icon"></i>
                <span class="menu-title">{!! trans('messages.quotation.title') !!}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{!! url('/employee/pet/list') !!}">
                <i class="fa fa-paw menu-icon"></i>
                <span class="menu-title">{!! trans('messages.pet.title') !!}</span>
            </a>
        </li>
        @if(Auth::user()->role = 2)
        <li class="nav-item hide">
            <a class="nav-link" href="{!! url('/employee/sick/list') !!}">
                <i class="fa fa-paw menu-icon"></i>
                <span class="menu-title">{!! trans('messages.analyze.analyze') !!}</span>
            </a>
        </li>
        @endif
        <li class="nav-item w3-hide-small">
            <a class="nav-link" href="{!! url('/employee/sick/list') !!}">
                <i class="fa fa-paw menu-icon"></i>
                <span class="menu-title">{!! trans('messages.analyze.analyze') !!}</span>
            </a>
        </li>
        <li class="nav-item w3-hide-small">
            <a class="nav-link" href="{!! url('/employee/category/list') !!}">
                <i class="fa fa-database menu-icon" aria-hidden="true" ></i>
                <span class="menu-title">{!! trans('messages.category.title') !!}</span>
            </a>
        </li>
        <li class="nav-item w3-hide-small">
            <a class="nav-link" href="{!! url('/employee/driver/list') !!}">
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
                <a class="nav-link" href="{!! url('/customer/news/list') !!}">
                    <i class="fa fa-newspaper-o menu-icon"></i>
                    <span class="menu-title">{!! trans('messages.news.title') !!}</span>
                </a>
            </li>
        @endif
        <li class="nav-item w3-hide-small">
            <a class="nav-link" href="{!! url('/customer/news/list') !!}">
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
        <li class="nav-item w3-hide-small">
            <a class="nav-link" data-toggle="collapse" href="#auth_" aria-expanded="false" aria-controls="auth_">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">{!! trans('messages.finance.title') !!}</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth_">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{!! url('employee/list_income') !!}"> {!! trans('messages.finance.income') !!} </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
                </ul>
            </div>
        </li>
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
</nav>