<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
@if(!empty($promotion))
    @foreach($promotion as $key => $row)
        <div class="col-md-12 mySlides5">
            <div class="work-box">
                <div class="work-img">
                    @if(empty($row->photo))
                        <img class="card-img rounded-0" src="{!! asset('images/shutterstock_477383266.jpg') !!}" alt="">
                    @else
                        <img class="card-img rounded-0" src="{!! asset($row->photo) !!}" alt="">
                    @endif
                </div>
                <div class="work-content">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2 class="w-title">{!! $row{'name_'.Session::get('locale')} !!}</h2>
                            <div class="w-more">
                                <span class="s-description text-center">{!! $row{'detail_'.Session::get('locale')} !!}</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
{{--            <button class="w3-button w3-black w3-display-left" onclick="plusDivs1(-1)">&#10094;</button>--}}
{{--            <button class="w3-button w3-black w3-display-right" onclick="plusDivs1(1)">&#10095;</button>--}}

        </div>
    @endforeach
    <div class="col-md-12">
    <div class="w3-center">
        <div class="w3-section">
            <button class="w3-button w3-light-grey" onclick="plusDivs(-1)">❮ {!! trans('messages.prev') !!}</button>
            <button class="w3-button w3-light-grey" onclick="plusDivs(1)">{!! trans('messages.next') !!} ❯</button>
        </div>
        @foreach($promotion as $key => $row)
            <button class="w3-button demo" onclick="currentDiv({!! $key+1 !!})">{!! $key+1 !!}</button>
        @endforeach
    </div>
    </div>
@endif


<script>
    var slideIndex = 1;
    showDivs_promo(slideIndex);

    function plusDivs(n) {
        showDivs_promo(slideIndex += n);
    }

    function currentDiv(n) {
        showDivs_promo(slideIndex = n);
    }

    function showDivs_promo(n) {
        var i;
        var x = document.getElementsByClassName("mySlides5");
        var dots = document.getElementsByClassName("demo");
        if (n > x.length) {slideIndex = 1}
        if (n < 1) {slideIndex = x.length}
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" w3-red", "");
        }
        x[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " w3-red";
    }
    // var slideIndex = 1;
    // showDivs(slideIndex);
    //
    // function plusDivs1(n) {
    //     showDivs(slideIndex += n);
    // }
    //
    // function showDivs(n) {
    //     var i;
    //     var x = document.getElementsByClassName("mySlides1");
    //     if (n > x.length) {slideIndex = 1}
    //     if (n < 1) {slideIndex = x.length}
    //     for (i = 0; i < x.length; i++) {
    //         x[i].style.display = "none";
    //     }
    //     x[slideIndex-1].style.display = "block";
    // }

    // var myIndex = 0;
    // carousel();
    //
    // function carousel() {
    //     var i;
    //     var x = document.getElementsByClassName("mySlides");
    //     for (i = 0; i < x.length; i++) {
    //         x[i].style.display = "none";
    //     }
    //     myIndex++;
    //     if (myIndex > x.length) {myIndex = 1}
    //     x[myIndex-1].style.display = "block";
    //     setTimeout(carousel, 2000); // Change image every 2 seconds
    // }
</script>
