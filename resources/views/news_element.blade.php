<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


@if(!empty($p_row))
        <div class="row">
            @foreach($p_row as $key => $row)
                <div class="col-md-12 mySlides_new">
                    <div class="service-box" >
                        <div class="service-ico">
                            <img class="card-img rounded-0" src="{!! asset($row->photo) !!}" alt="">
                        </div>
                        <div class="service-content">
                            <h2 class="s-title"> {!! $row{'name_'.Session::get('locale')} !!}</h2>
                            <p class="s-description text-center">
                               {!! $row{'detail_'.Session::get('locale')} !!}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-12">
            <div class="w3-center">
                <div class="w3-section">
                    <button class="w3-button w3-light-grey" onclick="plusDivs_new(-1)">❮ {!! trans('messages.prev') !!}</button>
                    <button class="w3-button w3-light-grey" onclick="plusDivs_new(1)">{!! trans('messages.next') !!} ❯</button>
                </div>
                @foreach($promotion as $key => $row)
                    <button class="w3-button demo_new" onclick="currentDiv_new({!! $key+1 !!})">{!! $key+1 !!}</button>
                @endforeach
            </div>
        </div>
    @endif
    <script>
        var slideIndex = 1;
        showDivs_new(slideIndex);

        function plusDivs_new(n) {
            showDivs_new(slideIndex += n);
        }

        function currentDiv_new(n) {
            showDivs_new(slideIndex = n);
        }

        function showDivs_new(n) {
            var i;
            var x = document.getElementsByClassName("mySlides_new");
            var dots = document.getElementsByClassName("demo_new");
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

