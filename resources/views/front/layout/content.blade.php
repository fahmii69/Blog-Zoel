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