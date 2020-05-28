<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Phuen Pet Shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
{{--    <link href="css_new/img/favicon.png" rel="icon">--}}
{{--    <link href="css_new/img/apple-touch-icon.png" rel="apple-touch-icon">--}}

    <!-- Bootstrap CSS File -->
    <link href="css_new/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
{{--    <link href="css_new/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">--}}
{{--    <link href="css_new/lib/animate/animate.min.css" rel="stylesheet">--}}
{{--    <link href="css_new/lib/ionicons/css/ionicons.min.css" rel="stylesheet">--}}
{{--    <link href="css_new/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">--}}
{{--    <link href="css_new/lib/lightbox/css/lightbox.min.css" rel="stylesheet">--}}

    <!-- Main Stylesheet File -->
    <link href="css_new/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .mySlides {display:none;}
    </style>
    <!-- =======================================================
      Theme Name: DevFolio
      Theme URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
      Author: BootstrapMade.com
      License: https://bootstrapmade.com/license/
    ======================================================= -->
</head>

<body id="page-top">
<?php
if(!empty($store_profile->photo_logo)){
    $logo = $store_profile->photo_logo;
}else{
    $logo = 'img/logo.png';
}
Session::put('logo',$logo);
?>
<!--/ Nav Star /-->
<nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll" href="#page-top"><img src="{!! asset($logo) !!}" alt=""></a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
                aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link js-scroll active" href="#home">{!! trans('messages.home') !!}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll" href="#about">{!! trans('messages.analyze.analyze') !!}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll" href="#service">{!! trans('messages.news.title') !!}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll" href="#work">{!! trans('messages.promotion.title') !!}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll" href="#blog">{!! trans('messages.know.title') !!}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll" href="#contact">{!! trans('messages.contract') !!}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll" href="{!! url('/locale/th') !!}">TH</a>
                </li>
                |
                <li class="nav-item">
                    <a class="nav-link js-scroll" href="{!! url('/locale/en') !!}">EN</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--/ Nav End /-->

<!--/ Intro Skew Star /-->
<?php
if(!empty($store_profile->photo_top)){
    $img_top = $store_profile->photo_top;
}else{
    $img_top = 'img/banner/home-banner.jpg';
}
?>
<div id="home" class="intro route bg-image" style="background-image: url({!! asset($img_top) !!})">
    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
        <div class="table-cell">
            <div class="container">
                <!--<p class="display-6 color-d">Hello, world!</p>-->
                <h1 class="intro-title mb-4">@if(!empty($store_profile)){!! $store_profile->{'name_'.Session::get('locale')} !!}@else welcome @endif</h1>
                <button type="button" class="main_btn btn-primary" data-toggle="modal" data-target="#modal-login">{!! trans('messages.login') !!}</button>
                <button type="button" class="main_btn_light btn-warning" data-toggle="modal" data-target="#modal-register">{!! trans('messages.register') !!}</button>

                <br><br>

{{--                <a href="{!! url('/locale/th') !!}"class="w3-button w3-black main_btn btn-warning" type="button">Thai</a>--}}
{{--                <a href="{!! url('/locale/en') !!}"class="w3-button w3-black main_btn btn-danger" type="button">English</a>--}}


            {{--
 <p class="intro-subtitle"><span class="text-slider-items">CEO DevFolio,Web Developer,Web Designer,Frontend Developer,Graphic Designer</span><strong class="text-slider"></strong></p>--}}
                <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Learn More</a></p> -->
            </div>
        </div>
    </div>
</div>
<!--/ Intro Skew End /-->

<section id="about" class="about-mf sect-pt4 route">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="box-shadow-full">

                    <div class="title-box text-center">
                        <h3 class="title-a">
                            {!! trans('messages.search') !!}
                        </h3>
                        <div class="line-mf"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">
                            <select name="data_text1" id="" class="form-control data_text1">
                                <option value="">{!! trans('messages.search') !!}</option>
                                @foreach($sick as $t)
                                    <option value="{!! $t['id'] !!}">@if(empty(Session::get('locale'))){!! $t{'name_'.Session::get('locale','en')} !!}@else{!! $t{'name_'.Session::get('locale')} !!}@endif</option>
                                @endforeach
                            </select>
                            </div>

                            <div class="teble-responsive">
                                <table class="table show" style="width: 100%">

                                    <tr>
                                        <th colspan="2"></th>
                                    </tr>
                                    @if(!empty($sick))
                                        @foreach($sick as $val)
                                            <tr>
                                                <td style="text-align: left;font-weight: bold;" colspan="2">@if(empty(Session::get('locale'))){!! $val{'name_'.Session::get('locale','en')} !!}@else{!! $val{'name_'.Session::get('locale')} !!}@endif</td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: left;" colspan="2">@if(empty(Session::get('locale'))){!! $val{'detail_'.Session::get('locale','en')} !!}@else{!! $val{'detail_'.Session::get('locale')} !!}@endif</td>
                                            </tr>
                                            @foreach($val->join_sick_transection as $t)
                                                <tr>
                                                    <td style="font-weight: bold; margin: 0 0 0 15px;">{!! trans('messages.analyze.syndrome') !!}</td>
                                                    <td style="text-align: left;">@if(empty(Session::get('locale'))){!! $t['sick_'.Session::get('locale','en')] !!}@else{!! $t['sick_'.Session::get('locale')] !!}@endif</td>
                                                </tr>
                                                <tr>
                                                    <td style="font-weight: bold; margin: 0 0 0 15px;">{!! trans('messages.analyze.detail') !!}</td>
                                                    <td style="text-align: left;">@if(empty(Session::get('locale'))){!! $t['detail_'.Session::get('locale','en')] !!}@else{!! $t['detail_'.Session::get('locale')] !!}@endif</td>
                                                </tr>
                                                {{--@break--}}
                                            @endforeach
                                        @endforeach
                                    @endif
                                </table>
                                <br><br>
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
    </div>
</section>

<!--/ Section Services Star /-->
<section id="service" class="services-mf route">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-box text-center">
                    <h3 class="title-a">
                        {!! trans('messages.news.title') !!}
                    </h3>
                    <div class="line-mf"></div>
                </div>
            </div>
        </div>

        @include('news_element')

    </div>
</section>
<!--/ Section Services End /-->

<!--/ Section Portfolio Star /-->
<section id="work" class="portfolio-mf sect-pt4 route">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-box text-center">
                    <h3 class="title-a">
                        {!! trans('messages.promotion.title') !!}
                    </h3>
                    <div class="line-mf"></div>
                </div>
            </div>
        </div>
        <div class="row">
            @include('promotion')

        </div>
    </div>
</section>
<!--/ Section Portfolio End /-->

<!--/ Section Blog Star /-->
<section id="blog" class="blog-mf sect-pt4 route">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-box text-center">
                    <h3 class="title-a">
                        {!! trans('messages.know.title') !!}
                    </h3>
                    <div class="line-mf"></div>
                </div>
            </div>
        </div>
        <div class="row">

            @include('know')

        </div>
    </div>
</section>
<!--/ Section Blog End /-->

<!--/ Section Contact-Footer Star /-->
<section id="contact" class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 style="text-align: center">{!! trans('messages.store_profile.contact') !!}</h2>
                <span><p style="text-align: center">@if(!empty($store_profile)){!! $store_profile->tell !!} @else welcome @endif</p></span>
                <p class="pt-3" style="text-align: center">@if(!empty($store_profile)){!! $store_profile->address !!} @else welcome @endif</p>

            </div>
        </div>
    </div>
    <footer>
        <?php
        if(!empty($store_profile->photo_logo)){
            $logo = $store_profile->photo_logo;
        }else{
            $logo = 'img/logo.png';
        }
        Session::put('logo',$logo);
        ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="copyright-box">
                        <p class="copyright"><strong><img src="{!! asset($logo) !!}" alt=""></strong></p>
                        <div class="credits">
                            <!--
                              All the links in the footer should remain intact.
                              You can delete the links only if you purchased the pro version.
                              Licensing information: https://bootstrapmade.com/license/
                              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=DevFolio
                            -->
{{--                            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</section>
<!--/ Section Contact-footer End /-->

<div class="modal fade" id="modal-login" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{!! trans('messages.login') !!}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{!! trans('messages.user_id') !!}</label>

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
                            <label for="password" class="col-md-4 col-form-label text-md-right">{!! trans('messages.pass') !!}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {!! trans('messages.login') !!}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">{!! trans('messages.closed') !!}</button>
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
                <h4 class="modal-title">{!! trans('messages.register') !!}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="POST" action="{!! url('user/register') !!}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{!! trans('messages.name') !!}</label>

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
                            <label for="email" class="col-md-4 col-form-label text-md-right">{!! trans('messages.user_id') !!}</label>

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
                            <label for="password" class="col-md-4 col-form-label text-md-right">{!! trans('messages.pass') !!}</label>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{!! trans('messages.pass_com') !!}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {!! trans('messages.register') !!}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">{!! trans('messages.closed') !!}</button>
            </div>
        </div>

    </div>
</div>
<!-- End Modal Register-->
<input type="hidden" id="root-url" value="{!! url('/') !!}">


<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<div id="preloader"></div>

<!-- JavaScript Libraries -->
<script src="css_new/lib/jquery/jquery.min.js"></script>
<script src="css_new/lib/jquery/jquery-migrate.min.js"></script>
<script src="css_new/lib/popper/popper.min.js"></script>
<script src="css_new/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="css_new/lib/easing/easing.min.js"></script>
<script src="css_new/lib/counterup/jquery.waypoints.min.js"></script>
<script src="css_new/lib/counterup/jquery.counterup.js"></script>
<script src="css_new/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="css_new/lib/lightbox/js/lightbox.min.js"></script>
<script src="css_new/lib/typed/typed.min.js"></script>
<!-- Contact Form JavaScript File -->
<script src="css_new/contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="css_new/js/main.js"></script>

</body>

<meta name="csrf-token" content="{{ csrf_token() }}">

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

        $('.show').hide();
        $('.show1').hide();
        $('body').on('change','.data_text1',function(){
            var data = $('.data_text1').val();
            console.log(data);
            $.ajax({
                url: $('#root-url').val()+'/search/pet',
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
                        console.log(val);
                        if(val.type == 1){
                            var check = '<button class="btn btn-success" type="button" data-toggle="dropdown">{!! trans('messages.normal') !!}';
                        }
                        else if(val.type == 2){
                            var check = '<button class="btn btn-warning" type="button" data-toggle="dropdown">{!! trans('messages.self') !!}';
                        }
                        else{
                            var check = '<button class="btn btn-danger" type="button" data-toggle="dropdown">{!! trans('messages.doctor') !!}';
                         }

                        var type1 = '{!! trans('messages.analyze.name') !!}';
                        var type2 = '{!! trans('messages.analyze.detail') !!}';
                        var type3 = '{!! trans('messages.treatment') !!}';
                        data_ = [
                            '<tr class="itemRow">',
                            '<th style="background-color: grey">'+type1+'</th>',
                            '<th style="background-color: grey">'+type2+'</th>',
                            '<th style="background-color: grey">'+type3+'</th>',                            '<tr>',
                            '<td style="text-align:left;font-weight: bold; width:25%;">'+val.join_sick.name_{!! Session::get('locale') !!}+'</td>',
                            '<td>'+val.join_sick.detail_{!! Session::get('locale') !!}+'</td>',
                            '<td></td>',
                            '</tr>',
                            '<tr>',
                            '<td style="text-align:left;font-weight: bold; width:25%;">'+val.sick_{!! Session::get('locale') !!}+'</td>',
                            '<td>'+val.detail_{!! Session::get('locale') !!}+'</td>',
                            '<td>'+check+'</td>',
                            '</tr>'
                        ].join('');

                        $('.itemTables').append(data_);
                    });

                }, error: function () {

                    console.log('Error Search Data Product');
                }
            });
        });

        // $('.search-store').on('click',function () {
        //     //alert('aa');
        //     propertyPage (1);
        // });

        $('body').on('click','.p-paginate-link', function (e){
            e.preventDefault();
            propertyPage($(this).attr('data-page'));
            //alert('aa');
        });

        $('body').on('change','.p-paginate-select', function (e){
            e.preventDefault();
            propertyPage($(this).val());
        });

        function propertyPage (page) {

            // $('.search-store').on('click', function () {
            var data = $('#search-form').serialize()+'&page='+page;
            //alert('aa');
            console.log(data);
            $('#landing-subject-list').css('opacity', '0.6');
            $.ajax({
                url: $('#root-url').val() + '/',
                method: 'post',
                dataType: 'html',
                data: data,
                success: function (e) {
                    $('#landing-subject-list').css('opacity', '1').html(e);
                    // window.location.reload();
                }, error: function () {
                    console.log('Error Search Data Store');
                }
            });
            // });
        }

    });

</script>
</html>
