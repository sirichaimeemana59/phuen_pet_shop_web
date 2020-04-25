<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>Phuen Pet Shop</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vname_enendors/animate-css/animate.css">
    <!-- main css -->
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<style>
    .banner-area {
        min-height: 800px;
        <?php
            if(!empty($store_profile->photo_top)){
                $img_top = $store_profile->photo_top;
            }else{
                $img_top = 'img/banner/home-banner.jpg';
            }
        ?>
        background-image: url({!! asset($img_top) !!});
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        position: relative; }

    .feature-section {
        <?php
           if(!empty($store_profile->photo_center)){
               $img_center = $store_profile->photo_center;
           }else{
               $img_center = "img/banner/pattern_bg.jpg";
           }
       ?>
        background: url({!! asset($img_center) !!}) no-repeat center;
        background-size: cover;
        padding: 60px 0; }

    .hotline-area {
        <?php
           if(!empty($store_profile->photo_foot)){
               $img_foot = $store_profile->photo_foot;
           }else{
               $img_foot = "img/background/bg1.jpg";
           }
       ?>
        color: #fff;
        background-image: url({!! asset($img_foot) !!});
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        position: relative;
        z-index: 1; }

</style>
<style>
    .alert {
        padding: 20px;
        background-color: #f44336;
        color: white;
        opacity: 1;
        transition: opacity 0.6s;
        margin-bottom: 15px;
    }

    .alert.success {background-color: #4CAF50;}
    .alert.info {background-color: #2196F3;}
    .alert.warning {background-color: #ff9800;}

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }
</style>
<script>
    var close = document.getElementsByClassName("closebtn");
    var i;

    for (i = 0; i < close.length; i++) {
        close[i].onclick = function(){
            var div = this.parentElement;
            div.style.opacity = "0";
            setTimeout(function(){ div.style.display = "none"; }, 100);
        }
    }
</script>
<body>

@if(!empty($p) && $p == 1){
<div class="alert">
    <span class="closebtn">&times;</span>
    <strong>Danger!</strong> ขออภัยรหัสผ่านไม่ถูกต้อง!!.
</div>
}
@endif


@if(!empty($p) && $p == 2){
<div class="alert">
    <span class="closebtn">&times;</span>
    <strong>Danger!</strong> ขออภัย User ID ซ้ำ กันในระบบ กรุณาระบุใหม่!!.
</div>
}
@endif

<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="top_menu row m0">
        <div class="container">
            {{--<div class="float-left">--}}
                {{--<a class="dn_btn" href="mailto:medical@example.com"><i class="ti-email"></i>medical@example.com</a>--}}
                {{--<span class="dn_btn"> <i class="ti-location-pin"></i>Find our Location</span>--}}
            {{--</div>--}}
            {{--<div class="float-right">--}}
                {{--<ul class="list header_social">--}}
                    {{--<li><a href="#"><i class="ti-facebook"></i></a></li>--}}
                    {{--<li><a href="#"><i class="ti-twitter-alt"></i></a></li>--}}
                    {{--<li><a href="#"><i class="ti-linkedin"></i></a></li>--}}
                    {{--<li><a href="#"><i class="ti-skype"></i></a></li>--}}
                    {{--<li><a href="#"><i class="ti-vimeo-alt"></i></a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        </div>
    </div>
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <?php
                    if(!empty($store_profile->photo_logo)){
                        $logo = $store_profile->photo_logo;
                    }else{
                        $logo = 'img/logo.png';
                    }
                    Session::put('logo',$logo);
                ?>
                <a class="navbar-brand logo_h" href=""><img src="{!! asset($logo) !!}" alt=""></a>
                {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                    {{--<span class="icon-bar"></span>--}}
                {{--</button>--}}
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    {{--<ul class="nav navbar-nav menu_nav ml-auto">--}}
                        {{--<li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>--}}
                        {{--<li class="nav-item"><a class="nav-link" href="about-us.html">About</a></li>--}}
                        {{--<li class="nav-item"><a class="nav-link" href="department.html">Department</a></li>--}}
                        {{--<li class="nav-item"><a class="nav-link" href="doctors.html">Doctors</a></li>--}}
                        {{--<li class="nav-item submenu dropdown">--}}
                            {{--<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>--}}
                            {{--<ul class="dropdown-menu">--}}
                                {{--<li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>--}}
                                {{--<li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>--}}
                                {{--<li class="nav-item"><a class="nav-link" href="element.html">element</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>--}}
                    {{--</ul>--}}
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================Header Menu Area =================-->

<!--================Home Banner Area =================-->

<section class="banner-area d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <h1>@if(!empty($store_profile)){!! $store_profile->{'name_'.Session::get('locale')} !!}@else welcome @endif</h1>
                {{--<a href="" class="main_btn">Make an Appointment</a>--}}
                <button type="button" class="main_btn" data-toggle="modal" data-target="#modal-login">Login</button>
                <button type="button" class="main_btn_light" data-toggle="modal" data-target="#modal-register">Register</button>

                <br><br>

                <a href="{!! url('/locale/th') !!}"class="w3-button w3-black main_btn">Thai</a>
                <a href="{!! url('/locale/en') !!}"class="w3-button w3-black main_btn">English</a>

                {{--<a href="" class="main_btn_light">View Department</a>--}}
            </div>
        </div>
    </div>

</section>

<!--================End Home Banner Area =================-->


<!--================ Feature section start =================-->
<section class="feature-section">
    <div class="container">
        <div class="row">
            {{--<div class="col-md-4">--}}
                {{--<div class="card card-feature text-center text-lg-left">--}}

                    {{--<h3 class="card-feature__title"><span class="card-feature__icon">--}}
                                {{--<i class="ti-layers"></i>--}}
                            {{--</span>Primary Care</h3>--}}
                    {{--<p class="card-feature__subtitle">An so vulgar to on points wanted rapture ous resolving continued household </p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
                {{--<div class="card card-feature text-center text-lg-left">--}}

                    {{--<h3 class="card-feature__title"><span class="card-feature__icon">--}}
                                {{--<i class="ti-heart-broken"></i>--}}
                            {{--</span>Emergency Cases</h3>--}}
                    {{--<p class="card-feature__subtitle">An so vulgar to on points wanted rapture ous resolving continued household </p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
                {{--<div class="card card-feature text-center text-lg-left">--}}

                    {{--<h3 class="card-feature__title"><span class="card-feature__icon">--}}
                                {{--<i class="ti-headphone-alt"></i>--}}
                            {{--</span>Online Appointment</h3>--}}
                    {{--<p class="card-feature__subtitle">An so vulgar to on points wanted rapture ous resolving continued household </p>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
</section>
<!--================ Feature section end =================-->

<!--================ Service section start =================-->

<div class="service-area area-padding-top">
    <div class="container">
        <div class="area-heading row">
            <div class="col-md-5 col-xl-4">
                <h3>{!! trans('messages.analyze.analyze') !!}</h3>
            </div>
            <div class="col-md-7 col-xl-8">
                <p>{!! trans('messages.analyze.title') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card-service text-center text-lg-left mb-4 mb-lg-0">
                        <p style="text-align: center;"><img src="{!! asset('/images/image') !!}" alt="" width="15%"></p>

                    <div class="form-group">
                        <lable class="col-sm-2 control-label">{!! trans('messages.search') !!}</lable>
                        <div class="col-sm-12">
                            <input type="text" class="form-control data_text" name="data">
                        </div>
                    </div>

                    <div class="teble-responsive">
                        <table class="table show" style="width: 100%">

                            <tr>
                                <th colspan="2"></th>
                            </tr>
                            @if(!empty($sick))
                                @foreach($sick as $val)
                                    <tr>
                                        <td style="text-align: left;font-weight: bold;" colspan="2">{!! $val{'name_'.Session::get('locale')} !!}</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left;" colspan="2">{!! $val{'detail_'.Session::get('locale')} !!}</td>
                                    </tr>
                                    @foreach($val->join_sick_transection as $t)
                                        <tr>
                                            <td style="font-weight: bold; margin: 0 0 0 15px;">{!! trans('messages.analyze.syndrome') !!}</td>
                                            <td style="text-align: left;">{!! $t['sick_'.Session::get('locale')] !!}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold; margin: 0 0 0 15px;">{!! trans('messages.analyze.detail') !!}</td>
                                            <td style="text-align: left;">{!! $t['detail_'.Session::get('locale')] !!}</td>
                                        </tr>
                                            {{--@break--}}
                                    @endforeach
                                @endforeach
                            @endif
                        </table>
                        <table class="table itemTables show1" style="width: 100%">
                            <tr>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!--================ Service section end =================-->


<!--================About  Area =================-->
{{--<section class="about-area" style="background-image: none">--}}
{{--    <div class="container">--}}
{{--        <div class="row align-items-center">--}}
{{--            <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-6 offset-xl-7 col-xl-5">--}}
{{--                --}}{{--<div class="about-content">--}}
{{--                    --}}{{--<h4>Second Abundantly<br>--}}
{{--                        --}}{{--Move That Cattle Perform<br>--}}
{{--                        --}}{{--Appen Land</h4>--}}
{{--                    --}}{{--<h6>Give their their without moving were stars called so divide in female be moving night may fish him</h6>--}}
{{--                    --}}{{--<p>Give their their without moving were stars called so divide female be moving night may fish him own male vreated great Give their their without moving were. Stars called so divide female moving night may fish him own male created great opportunity deal.</p>--}}

{{--                    --}}{{--<a class="link_one" href="#">learn more</a>--}}

{{--                --}}{{--</div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
<!--================About Area End =================-->

<!--================ Team section start =================-->
<section class="team-area area-padding">
    <div class="container">
        <div class="area-heading row">
            <div class="col-md-5 col-xl-4">
                <h3>{!! trans('messages.news.title') !!}</h3>
            </div>
        </div>

        <div class="row">
            @if(!empty($new))
            @foreach($new as $key => $row)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-team">
                    <img class="card-img rounded-0" src="{!! asset($row->photo) !!}" alt="">
                    <div class="card-team__body text-center">
                        <h3>{!! $row{'name_'.Session::get('locale')} !!}</h3>
                        <div class="accordion" id="accordionExample">
                              <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#aa{!! $key !!}" aria-expanded="false" aria-controls="collapseOne">
                                            {!! trans('messages.news.detail') !!}
                                        </button>

                                    </h5>
                                </div>

                                <div id="aa{!! $key !!}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        {!! $row{'detail_'.Session::get('locale')} !!}
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
                @endif
        </div>
    </div>
</section>
<!--================ Team section end =================-->
<!--================ Team section start =================-->
<section class="team-area area-padding">
    <div class="container">
        <div class="area-heading row">
            <div class="col-md-5 col-xl-4">
                <h3>{!! trans('messages.promotion.title') !!}</h3>
            </div>
        </div>

        <div class="row">
            @if(!empty($promotion))
            @foreach($promotion as $key => $row)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card card-team">
                        @if(empty($row->photo))
                                <img class="card-img rounded-0" src="{!! asset('images/shutterstock_477383266.jpg') !!}" alt="">
                            @else
                                <img class="card-img rounded-0" src="{!! asset($row->photo) !!}" alt="">
                        @endif
                        <div class="card-team__body text-center">
                            <h3>{!! $row{'name_'.Session::get('locale')} !!}</h3>
                            <div class="accordion" id="accordionExample">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#bb{!! $key !!}" aria-expanded="false" aria-controls="collapseOne">
                                            {!! trans('messages.promotion.detail') !!}
                                        </button>

                                    </h5>
                                </div>

                                <div id="bb{!! $key !!}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        {!! $row{'detail_'.Session::get('locale')} !!}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                @endif
        </div>
    </div>
</section>
<!--================ Team section end =================-->
<br><br><br><br><br><br><br><br><br><br><br>



<!-- ================ testimonial section start ================= -->
<section class="testimonial">
    <div class="container">
        <div class="testi_slider owl-carousel owl-theme">
            @if(!empty($know))
                @foreach($know as $val)
                    <div class="item">
                        <div class="testi_item">
                            <div class="testimonial_image">
                                <img src="{!! asset($val->photo) !!}" alt="">
                            </div>
                            <div class="testi_item_content">
                                <h4>{!! $val{'name_'.Session::get('locale')} !!}</h4>
                                <p>{!! $val{'detail_'.Session::get('locale')} !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
        </div>
    </div>
</section>
<!-- ================ testimonial section end ================= -->

<!-- ================ Hotline Area Starts ================= -->
<section class="hotline-area text-center area-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>{!! trans('messages.store_profile.contact') !!}</h2>
                <span>@if(!empty($store_profile)){!! $store_profile->tell !!} @else welcome @endif</span>
                <p class="pt-3">@if(!empty($store_profile)){!! $store_profile->address !!} @else welcome @endif</p>
            </div>
        </div>
    </div>
</section>
<!-- ================ Hotline Area End ================= -->


<!-- start footer Area -->
{{--<footer class="footer-area area-padding-top">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-lg-2 col-sm-6 single-footer-widget">--}}
                {{--<h4>Top Products</h4>--}}
                {{--<ul>--}}
                    {{--<li><a href="#">Managed Website</a></li>--}}
                    {{--<li><a href="#">Manage Reputation</a></li>--}}
                    {{--<li><a href="#">Power Tools</a></li>--}}
                    {{--<li><a href="#">Marketing Service</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="col-lg-2 col-sm-6 single-footer-widget">--}}
                {{--<h4>Quick Links</h4>--}}
                {{--<ul>--}}
                    {{--<li><a href="#">Jobs</a></li>--}}
                    {{--<li><a href="#">Brand Assets</a></li>--}}
                    {{--<li><a href="#">Investor Relations</a></li>--}}
                    {{--<li><a href="#">Terms of Service</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="col-lg-2 col-sm-6 single-footer-widget">--}}
                {{--<h4>Features</h4>--}}
                {{--<ul>--}}
                    {{--<li><a href="#">Jobs</a></li>--}}
                    {{--<li><a href="#">Brand Assets</a></li>--}}
                    {{--<li><a href="#">Investor Relations</a></li>--}}
                    {{--<li><a href="#">Terms of Service</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="col-lg-2 col-sm-6 single-footer-widget">--}}
                {{--<h4>Resources</h4>--}}
                {{--<ul>--}}
                    {{--<li><a href="#">Guides</a></li>--}}
                    {{--<li><a href="#">Research</a></li>--}}
                    {{--<li><a href="#">Experts</a></li>--}}
                    {{--<li><a href="#">Agencies</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="col-lg-4 col-md-6 single-footer-widget">--}}
                {{--<h4>Newsletter</h4>--}}
                {{--<p>You can trust us. we only send promo offers,</p>--}}
                {{--<div class="form-wrap" id="mc_embed_signup">--}}
                    {{--<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"--}}
                          {{--method="get" class="form-inline">--}}
                        {{--<input class="form-control" name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'"--}}
                               {{--required="" type="email" />--}}
                        {{--<button class="click-btn btn btn-default">--}}
                            {{--<i class="ti-arrow-right"></i>--}}
                        {{--</button>--}}
                        {{--<div style="position: absolute; left: -5000px;">--}}
                            {{--<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text" />--}}
                        {{--</div>--}}

                        {{--<div class="info"></div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row footer-bottom d-flex justify-content-between">--}}
            {{--<p class="col-lg-8 col-sm-12 footer-text m-0">--}}
                {{--<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->--}}
                {{--Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>--}}
                {{--<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->--}}
            {{--</p>--}}
            {{--<div class="col-lg-4 col-sm-12 footer-social">--}}
                {{--<a href="#"><i class="fab fa-facebook-f"></i></a>--}}
                {{--<a href="#"><i class="fab fa-twitter"></i></a>--}}
                {{--<a href="#"><i class="fab fa-dribbble"></i></a>--}}
                {{--<a href="#"><i class="fab fa-linkedin"></i></a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</footer>--}}
<!-- End footer Area -->
<!-- Modal Login-->
<div class="modal fade" id="modal-login" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Login</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2>Login</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">User ID</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="ID" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!-- End Modal Login-->

<!-- Modal Register-->
<div class="modal fade" id="modal-register" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Register</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="POST" action="{!! url('user/register') !!}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">User ID</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="ID">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!-- End Modal Register-->




<input type="hidden" id="root-url" value="{!! url('/') !!}">
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/stellar.js"></script>
<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/contact.js"></script>
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/mail-script.js"></script>
<script src="js/theme.js"></script>
</body>
<meta name="csrf-token" content="{{ csrf_token() }}">
{{--@section('script')--}}
    {{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>--}}
    {{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>--}}
    {{--<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>--}}
    <script type="text/javascript">
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.modal-login').on('click',function(){
                //alert('aa');
                $('#modal-login').modal('show');
            });

            var delay = 600;
            var timer;

            $('.show1').hide();
            $('body').on('keyup','.data_text',function(){
                var data = $('.data_text').val();
                console.log(data);
                window.clearTimeout(timer);
                timer = window.setTimeout(function(){
                    $.ajax({
                        url: $('#root-url').val()+'/pet',
                        method: 'post',
                        dataType: 'JSON',
                        data: {'data':data},
                        success: function (e) {
                            if(e.length == 0){
                                $('.show').show();
                                $('.show1').hide();
                            }else{
                                $('.show').hide();
                                $('.show1').show();
                            }

                            console.log(e);
                            $('.itemTables').html('');
                            var data_ =[];

                            $.each(e, function(i, val){
                                data_ = [
                                    '<tr class="itemRow">',
                                    '<td style="text-align:left;font-weight: bold; width:25%;">'+val.join_sick.name_{!! Session::get('locale') !!}+'</td>',
                                    '<td>'+val.join_sick.detail_{!! Session::get('locale') !!}+'</td>',
                                    '</tr>',
                                    '<tr>',
                                    '<td style="text-align:left;font-weight: bold; width:25%;">'+val.sick_{!! Session::get('locale') !!}+'</td>',
                                    '<td>'+val.detail_{!! Session::get('locale') !!}+'</td>',
                                    '</tr>'
                                ].join('');

                                $('.itemTables').append(data_);
                            });

                        }, error: function () {

                            console.log('Error Search Data Product');
                        }
                    });
                },delay);
            });

        });

    </script>

{{--@endsection--}}
</html>
