<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

@if(!empty($know))
    @foreach($know as $val)

        <div class="col-md-12 mySlides_know">
            <div class="card card-blog">
                <div class="card-img">
                    <img class="card-img rounded-0" src="{!! asset($val->photo) !!}" alt="">
                </div>
                <div class="card-body">

                        <h6 style="text-align: center">{!! $val{'name_'.Session::get('locale')} !!}</h6>

                    <p class="card-description">
                        {!! $val{'detail_'.Session::get('locale')} !!}
                    </p>
                </div>
            </div>

{{--            <button class="w3-button w3-black w3-display-left" onclick="plusDivs1(-1)">&#10094;</button>--}}
{{--            <button class="w3-button w3-black w3-display-right" onclick="plusDivs1(1)">&#10095;</button>--}}

        </div>
    @endforeach
    <div class="col-md-12">
        <div class="w3-center">
            <div class="w3-section">
                <button class="w3-button w3-light-grey" onclick="plusDivs_know(-1)">❮ {!! trans('messages.prev') !!}</button>
                <button class="w3-button w3-light-grey" onclick="plusDivs_know(1)">{!! trans('messages.next') !!} ❯</button>
            </div>
            @foreach($promotion as $key => $row)
                <button class="w3-button demo_konw" onclick="currentDiv_know({!! $key+1 !!})">{!! $key+1 !!}</button>
            @endforeach
        </div>
    </div>
@endif

<script>
    var slideIndex = 1;
    showDivs_know(slideIndex);

    function plusDivs_know(n) {
        showDivs_know(slideIndex += n);
    }

    function currentDiv_know(n) {
        showDivs_know(slideIndex = n);
    }

    function showDivs_know(n) {
        var i;
        var x = document.getElementsByClassName("mySlides_know");
        var dots = document.getElementsByClassName("demo_konw");
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
    // function plusDivs2(n) {
    //     showDivs(slideIndex += n);
    // }
    //
    // function showDivs(n) {
    //     var i;
    //     var x = document.getElementsByClassName("mySlides2");
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
