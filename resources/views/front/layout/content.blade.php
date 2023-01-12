<!-- SECTION -->
@include('front.layout._head')
<!-- container -->

<!-- Slider main container -->
@yield('dashboard-slider')

<!-- POST -->
<div class="container" style="margin-top:10px">
    <div class="row">
        @yield('post')
        @include('front.layout._widget')
    </div>
</div>

<!-- Slider galery -->
@yield('dashboard-galery')
@include('front.layout._footer')
 
{{-- Dashboard Script --}}
<script>
    let swiper = new Swiper('.swiper', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
			clickable: true,
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
		debugging: true,
    });

	$('#owl-carousel-one').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })

    $('#bottom-carousel').owlCarousel({
        loop:true,
        margin:10,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    })
</script>
