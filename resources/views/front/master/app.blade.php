
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<!--Head starts-->
@include('front.master.head')
<!--Head ends-->
<body>
    <!--Page Wrapper starts-->
    <div class="page-wrapper ">
        <!--header starts-->
        @include('front.master.header')
        <!--Header ends-->
        @yield('content')

    </div>   
    
    <!--Footer Starts-->
    @include('front.master.footer')
    <!--Footer ends-->
</body>
</html>
