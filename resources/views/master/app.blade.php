
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Metas -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="LionCoders" />
    <!-- Links -->
    <link rel="icon" type="image/png" href="#" />
    <!-- google fonts-->
    <link href="{{ URL::asset('https://fonts.googleapis.com/css?family=Cairo&display=swap')}}" rel="stylesheet">
    <!-- Plugins CSS -->
    <link href="{{ URL::asset('css/plugin.css')}}" rel="stylesheet" />
    <!-- style CSS -->
    <link href="{{ URL::asset('css/style.css')}}" rel="stylesheet" />
    <!--color switcher css-->
    <link rel="stylesheet" href="{{ URL::asset('css/switcher/skin-aqua.css')}}" media="screen" id="style-colors" />
    <!-- Document Title -->
    <title>listagram - Directory Listing HTML Template</title>
</head>

<body>

    <!--Page Wrapper starts-->
    <div class="page-wrapper fixed-footer">
        <!--header starts-->
        @include('master.header')
        <!--Header ends-->


        @yield('content')




        <!--Footer Starts-->
        @include('master.footer')
        <!--Footer ends-->

<!--Scripts starts-->
<!--plugin js-->
<script src="{{ asset('js/plugin.js') }}"></script>
<!--google maps-->
<script
    src="{{ asset('https://maps.googleapis.com/maps/api/js?key=AIzaSyD_8C7p0Ws2gUu7wo0b6pK9Qu7LuzX2iWY&amp;libraries=places&amp;callback=initAutocomplete') }}"></script>
<!--Markercluster js-->
<script src="{{ asset('js/markerclusterer.js') }}"></script>
<!--Maps js-->
<script src="{{ asset('js/maps.js') }}"></script>
<!--Infobox js-->
<script src="{{ asset('js/infobox.min.js') }}"></script>
<!--Main js-->
<script src="{{ asset('js/main.js') }}"></script>
<!--Scripts ends-->

@stack('jqueryCode')
</body>

</html>
