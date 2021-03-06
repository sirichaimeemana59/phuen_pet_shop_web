{{--<nav class="sidebar sidebar-offcanvas" id="sidebar">--}}
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{!! url('/user/create_profile') !!}">
                <i class="fa fa-user menu-icon"></i>
                <span class="menu-title">{!! trans('messages.profile.title') !!}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{!! url('/customer/home') !!}">
                <i class="fa fa-paw menu-icon"></i>
                <span class="menu-title">{!! trans('messages.pet.title') !!}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{!! url('/customer/order') !!}">
                <i class="fa fa-shopping-bag menu-icon"></i>
                <span class="menu-title">{!! trans('messages.shop.title') !!}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{!! url('/customer/list_order') !!}">
                <i class="fa fa-shopping-bag menu-icon"></i>
                <span class="menu-title">{!! trans('messages.order.order') !!}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{!! url('/customer/add/comment') !!}">
                <i class="fa fa-commenting menu-icon"></i>
                <span class="menu-title">{!! trans('messages.comment.title') !!}</span>
            </a>
        </li>

        {{--<li class="nav-item">--}}
            {{--<a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">--}}
                {{--<i class="mdi mdi-account menu-icon"></i>--}}
                {{--<span class="menu-title">{!! trans('messages.report.title') !!}</span>--}}
                {{--<i class="menu-arrow"></i>--}}
            {{--</a>--}}
            {{--<div class="collapse" id="auth">--}}
                {{--<ul class="nav flex-column sub-menu">--}}
                    {{--<li class="nav-item"> <a class="nav-link" href="{!! url('widen/list_element') !!}"> {!! trans('messages.report.report_widen') !!} </a></li>--}}
                    {{--<li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>--}}
                    {{--<li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>--}}
                    {{--<li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>--}}
                    {{--<li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</li>--}}
        <li class="nav-item">
            <a class="nav-link" href="{!! url('/doc/print') !!}">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">{!! trans('messages.doc') !!}</span>
            </a>
        </li>
    </ul>
{{--</nav>--}}
