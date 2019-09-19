@extends('front.master.app')

@section('content')
  <!--Breadcrumb section starts-->
  <div class="breadcrumb-section" >
    <div class="overlay op-5"></div>
    <div class="container">
        <div class="row align-items-center  pad-top-80">

            <div class=" col-12">
                <div class="breadcrumb-menu text-center">
                    <ul>
                        <li class="active"><a href="#">الرئيسية</a></li>
                        <li><h2 class="page-title ">إضافة شريك</h2></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Breadcrumb section ends-->
<!--Add Listing starts-->
<div class="list-details-section section-padding add_list pad-top-90" id="tabsContainer">
        @if( isset($partner) )
        <form  action="{{route('partners.update',$partner->id)}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @else
        <form  action="{{route('partners.store')}}" method="post" enctype="multipart/form-data">

        @endif
        @csrf
    <div class="container">


        <div class="row">


            <div class="col-md-12">

                <ul class="nav nav-tabs list-details-tab">
                    <li class="nav-item {{ session('activeTab') == ''  ? "active" : "" }}">
                        <a data-toggle="tab" href="#general_info">بيانات الشريك</a>
                    </li>
                    <li class="nav-item {{ session('activeTab') == 'tab2'  ? "active" : "" }}">
                        <a data-toggle="tab" href="#gallery">الشعار</a>
                    </li>
                    <li class="nav-item {{ session('activeTab') == 'tab3'  ? "active" : "" }}">
                        <a data-toggle="tab" href="#location">الموقع وبيانات الاتصال<span
                                class="text-grey"></span></a>
                    </li>
                    <!-- <li class="nav-item {{ session('activeTab') == 'tab4'  ? "active" : "" }}">
                        <a data-toggle="tab" href="#open_time">ساعات العمل</a>
                    </li> -->

                    <li class="nav-item {{ session('activeTab') == 'tab4'  ? "active" : "" }}">
                        <a data-toggle="tab" href="#social_network">حسابات التواصل الاجتماعي <span
                                class="text-grey"></span></a>
                    </li>
                </ul>

<br>

                @if(session()->has('master_error'))
                <div class="alert alert-danger text-center" role="alert">
                  @if(isset($errors))
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li> {{ $error }}</li>
                     @endforeach
                    @endif
                  </ul>

                </div>
                 @endif

                @if(session()->has('message'))
                <div class="alert alert-success text-center" role="alert">
                {{ session()->get('message') }}
                </div>
                @endif


              <div class="tab-content mar-tb-30 add_list_content">

                    <div class="tab-pane fade {{ session('activeTab') == ''  ? "show active" : "" }}" id="general_info">

                        <h4> <i class="ion-ios-information"></i> بيانات الشريك:</h4>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has( 'legal_name' ) ? 'has-error' : '' }}">
                                    <label>إسم الشريك</label>
                                    <input name="legal_name"  type="text" class="form-control filter-input"
                                        placeholder="الإسم التجاري للشريك" value="{{ old('legal_name',
                                         isset($partner->legal_name) ? $partner->legal_name : '') }}">

                                        @if( $errors->has( 'legal_name' ) )
                                               <span class="help-block text-danger">
                                                   {{ $errors->first( 'legal_name' ) }}
                                               </span>
                                           @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has( 'partner_type' ) ? 'has-error' : '' }}">

                                    <label>الفئة</label>
                                    <div  tabindex="0"><span
                                            class="current"></span>

                                        <select  name="partner_type"  id="partner_type" class="nice-select filter-input"    >

                                            <option selected disabled > اختر الفئة</option>

                                            @foreach (partnersTypesArray() as $key => $value)
                                        <option
        {{ (old('partner_type', isset($partner->partner_type) ? $partner->partner_type:'' ) == $key ) ? 'selected':''  }} value="{{$key}}">

                                     {{$value}}
                                        </option>
                                            @endforeach
                                        </select>

                                        @if( $errors->has( 'partner_type' ) )
                                               <span class="help-block text-danger">
                                                   {{ $errors->first( 'partner_type' ) }}
                                               </span>
                                           @endif
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label>دلالات البحث</label>
                                    <input type="text" class="form-control filter-input"
                                        placeholder="أدخل كلمات البحث مفصولة بفاصلة">
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has( 'email' ) ? 'has-error' : '' }}">
                                    <label>البريد الإلكتروني الرسمي</label>
                                    <input name="email"  type="text" class="form-control filter-input"
                                        placeholder="سيكون البريد الإلكتروني هو اسم المستخدم"  value="{{old('email',
                                        isset($partner->email) ? $partner->email : '') }}">

                                        @if( $errors->has( 'email' ) )
                                               <span class="help-block text-danger">
                                                   {{ $errors->first( 'email' ) }}
                                               </span>
                                           @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group {{ $errors->has( 'subscription_type' ) ? 'has-error' : '' }}">
                                    <label>نوع الاشتراك</label>
                                    <div   class="filter-checkbox">
                                        <input  type="checkbox"  id="check-a"  name="subscription_type"   value="0"

                                        {{old('subscription_type',
                                        isset($partner->subscription_type) ?  'checked': '') }}>

                                        <label for="check-a">1 year 3000 USD</label>
                                        <!-- <input required id="check-b" type="checkbox" name="check">
                                        <label for="check-b">2 years 5000 usd</label>
                                        <input required id="check-c" type="checkbox" name="check">
                                        <label for="check-c">trial 3 months</label> -->

                                        @if( $errors->has( 'subscription_type' ) )
                                               <span class="help-block text-danger">
                                                   {{ $errors->first( 'subscription_type' ) }}
                                               </span>
                                           @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">

                                    <div class="form-group {{ $errors->has( 'about' ) ? 'has-error' : '' }}">
                                        <label for="list_info" >وصف الشريك</label>
                                            <textarea name="about" placeholder="أدخل وصف بسيط بخدمات الشريك" class="form-control" id="list_info"  rows="4"

                                            >{{old('about',
                                            isset($partner->about) ? $partner->about : '') }}</textarea>
                                            @if( $errors->has( 'about' ) )
                                            <span class="help-block text-danger">
                                                {{ $errors->first( 'about' ) }}
                                            </span>
                                            @endif


                                    </div>



                            </div>

                            <div class="col-md-12">


                            <div class="row">
                                        {{-- <div class="col-md-6">
                                            <div class="form-group">
                                        <label>رقم السفير</label>
                                        <input name="embassador_id"  type="number" class="form-control filter-input"
                                            placeholder="رقم السفير " value="{{ old('embassador_id',
                                            isset($partner->embassador_id) ? $partner->embassador_id : '') }}">

                                            @if( $errors->has( 'embassador_id' ) )
                                                   <span class="help-block text-danger">
                                                       {{ $errors->first( 'embassador_id' ) }}
                                                   </span>
                                               @endif

                                    </div>
                                </div>

                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>اسم السفير</label>
                                        <input  type="text" class="form-control filter-input"
                                            placeholder="this must be auto fill based on the ID">
                                    </div>
                                </div> --}}
                                @if (!isset($partner))


                                <div class="col-md-6">
                                        <div class="form-group {{ $errors->has( 'password' ) ? 'has-error' : '' }}">
                                            <label>  كلمه السر </label>
                                            <input  type="password" class="form-control filter-input"placeholder="كلمه السر" value="{{ old('password')}}" name="password">
                                            @if( $errors->has( 'password' ) )
                                                  <span class="help-block text-danger">
                                                      {{ $errors->first( 'password' ) }}
                                                  </span>
                                              @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has( 'confirm_password' ) ? 'has-error' : '' }}">
                                            <label> تاكيد كلمه السر </label>
                                            <input  type="password" class="form-control filter-input"placeholder="تاكيد كلمه السر  " name="confirm_password" value="{{ old('confirm_password')}}">
                                            @if( $errors->has( 'confirm_password' ) )
                                                  <span class="help-block text-danger">
                                                      {{ $errors->first( 'confirm_password' ) }}
                                                  </span>
                                              @endif
                                        </div>
                                    </div>

                                  @endif


                                    <div class="col-md-4">
                                        <a href="javascript:;"  class="btn v7 mar-top-20 next">حفظ ومتابعة</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                                             <!--  Replace this  -->
                            <div class="tab-pane fade text-center {{ session('activeTab') == 'tab2'  ? "show active" : "" }}" id="gallery">
                                    <h4><i class="ion-image"></i> الشعار </h4>
                                    <div class="form-group">
                                        <form class="photo-upload">
                                           <div class="form-group {{ $errors->has( 'image' ) ? 'has-error' : '' }}">
                                                <div class="add-listing__input-file-box">

                                                        <input class="add-listing__input-file" type="file" name="image"
                                                        id="file" onchange="readURL(this);"  value="{{ old('image',
                                                        isset($partner->image) ? $partner->image : '') }}">

                                                    <div class="add-listing__input-file-wrap">
                                                        <i class="ion-ios-cloud-upload"></i>
                                                        <p>إضغط هنا لرفع الشعار</p>
                                                        <img class="input-image-up" src="" alt="image"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                        <div class="text-center">
                                                            @if( $errors->has( 'image' ) )
                                                                   <span class="help-block text-danger">
                                                                       {{ $errors->first( 'image' ) }}
                                                                   </span>
                                                               @endif
                                                            </div>
                                                </div>
                                            </div>

                                    </div>
                                    <div class="add-btn">
                                            <a href="javascript:;" class="btn v8 mar-top-20 previous">الخطوه السابقه</a>
                                            <a href="javascript:;" class="btn v8 mar-top-20 next">حفظ ومتابعة</a>
                                    </div>
                                </div>
                                <!-- End replace -->

                    <div class="tab-pane fade {{ session('activeTab') == 'tab3'  ? "show active" : "" }}" id="location">
                        <h4><i class="ion-ios-location"></i> الموقع وبيانات الاتصال:</h4>
                        <div class="row">

                                {{-- <div class="form-group">
                                    <label>اختر الدولة</label>
                                    <div  tabindex="0"><span
                                            class="current"> </span>
                                        <select class="nice-select filter-input" name="location" value="{{old('location')}}">
                                           <option  selected disabled>اختر الدولة</option>

                                            <option class="option">السعودية</option>
                                            <option disabled>الامارات</option>
                                            <option disabled>الكويت</option>
                                            <option disabled>مصر</li>

                                        </select>
                                        @if( $errors->has( 'image' ) )
                                               <span class="help-block text-danger">
                                                   {{ $errors->first( 'image' ) }}
                                               </span>
                                           @endif
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                    <div class="form-group {{ $errors->has( 'city' ) ? 'has-error' : '' }}">
                                        <label> المدينه </label>
                                        <select class="form-control filter-input"  name="city" id="city">
                                            <option value="0">اختر المدينة</option>
                                            @foreach ($cities as $city)

                                                <option {{ (old('city', isset($partner->city) ? $partner->city:'' ) == $city->id) ? 'selected':''  }} value="{{$city->id}}">
                                                {{$city->name}}
                                                </option>
                                            @endforeach
                                        </select>

                                        @if( $errors->has( 'city' ) )
                                                <span class="help-block text-danger">
                                                    {{ $errors->first( 'city' ) }}
                                                </span>
                                            @endif
                                    </div>
                                </div>
                    
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has( 'phone' ) ? 'has-error' : '' }}">
                                    <label>الجوال </label>
                                    <input name="phone"  type="text" class="form-control filter-input" value="{{ old('phone',
                                    isset($partner->phone) ? $partner->phone : '') }}">

                                    @if( $errors->has( 'phone' ) )
                                           <span class="help-block text-danger">
                                               {{ $errors->first( 'phone' ) }}
                                           </span>
                                       @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div  class="form-group {{ $errors->has( 'map_address' ) ? 'has-error' : '' }}">
                                    <label>العنوان</label>
                                    <input name="map_address" id="map_address"  type="text" class="form-control filter-input"
                                        placeholder="ex. 250, Olayya Street..." value="{{ old('map_address',
                                        isset($partner->map_address) ? $partner->map_address : '') }}">

                                        @if( $errors->has( 'map_address' ) )
                                        <span class="help-block text-danger">
                                            {{ $errors->first( 'map_address' ) }}
                                        </span>
                                        @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has( 'postel_code' ) ? 'has-error' : '' }}">
                                    <label>الرمز البريدي</label>
                                    <input  name="postel_code" type="number" id="zipCode" class="form-control filter-input"
                                        placeholder="ex. 5858"  value="{{ old('postel_code',
                                        isset($partner->postel_code) ? $partner->postel_code : '') }}">

                                        @if( $errors->has( 'postel_code' ) )
                                        <span class="help-block text-danger">
                                            {{ $errors->first( 'postel_code' ) }}
                                        </span>
                                        @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has( 'lat' ) ? 'has-error' : '' }}">
                                    <input name="lat" type="hidden" id="lat" class="form-control filter-input"
                                         value="{{ old('lat',
                                        isset($partner->lat) ? $partner->lat : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has( 'lng' ) ? 'has-error' : '' }}">
                                    <input name="lng" type="hidden" id="lng" class="form-control filter-input"
                                         value="{{ old('lng',
                                        isset($partner->lng) ? $partner->lng : '') }}" >
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        بيانات الخريطة</label>
                                    <input required type="text" class="form-control filter-input"
                                        placeholder="Map Longitude">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        Latitude (Drag marker on the map) </label>
                                    <input required type="text" class="form-control filter-input"
                                        placeholder="Map Latitude">
                                </div>
                            </div> -->
                        </div>
                            <div class="col-md-12 no-padding">
                                <div id="map"></div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group mar-top-15">
                                    <label>الموقع الالكتروني </label>
                                    <input required type="text" class="form-control filter-input">
                                </div>
                            </div> -->

                            <div class="add-btn">
                                    <a href="javascript:;" class="btn v8 mar-top-20 previous">الخطوه السابقه</a>
                                    <a href="javascript:;" class="btn v8 mar-top-20 next">حفظ ومتابعة</a>
                            </div>

                        </div>


                    <div class="tab-pane fade {{ session('activeTab') == 'tab4'  ? "show active" : "" }}" id="social_network">
                        <h4><i class="icofont-ui-social-link"></i>حسابات مواقع التواصل الإجتماعي</h4>
                        <div class="row">
                            <div class="col-md-4">

                                <div class="form-group {{ $errors->has( 'facebook' ) ? 'has-error' : '' }}">
                                    <label>الفيسبوك - اختياري</label>
                                    <input  type="text" name="facebook" class="form-control filter-input"
                                        placeholder="رابط الفيسبوك" value="{{ old('facebook',  isset($partner->facebook) ? $partner->facebook : '') }}">
                                        @if( $errors->has( 'facebook' ) )
                                        <span class="help-block text-danger">
                                            {{ $errors->first( 'facebook' ) }}
                                        </span>
                                        @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has( 'instagram' ) ? 'has-error' : '' }}">
                                    <label>الانستغرام - اختياري</label>
                                    <input  type="text" name="instagram" class="form-control filter-input"
                                        placeholder="رابط الانستغرام" value="{{ old('instagram',  isset($partner->instagram) ? $partner->instagram : '') }}">
                                        @if( $errors->has( 'instagram' ) )
                                        <span class="help-block text-danger">
                                            {{ $errors->first( 'instagram' ) }}
                                        </span>
                                        @endif

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has( 'twitter' ) ? 'has-error' : '' }}">
                                    <label>تويتر - اختياري</label>
                                    <input  type="text" name="twitter" class="form-control filter-input"
                                        placeholder="رابط التويتر" value="{{ old('twitter',  isset($partner->twitter) ? $partner->twitter : '') }}">
                                        @if( $errors->has( 'twitter' ) )
                                        <span class="help-block text-danger">
                                            {{ $errors->first( 'twitter' ) }}
                                        </span>
                                        @endif
                                </div>
                            </div>
                            <div class="col-12 ">
                                    <div class="form-group {{ $errors->has( 'remember' ) ? 'has-error' : '' }}">

                                <div class="res-box mar-top-10">
                                    <input required type="checkbox" tabindex="3" class="" name="remember"
                                        id="remember">
                                    <label for="remember">أوافق على <a href="terms.html">الشروط
                                            والأحكام</a></label>
                                            @if( $errors->has( 'remember' ) )
                                            <span class="help-block text-danger">
                                                {{ $errors->first( 'remember' ) }}
                                            </span>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">

                                <a href="javascript:;" class="btn v8 previous mar-top-10">الخطوه السابقه</a>

                                {{-- <button class="btn v8" type="submit">مراجعة</button> --}}
                                <button type="submit" class="btn v8 mar-top-10" >حفظ وتسجيل</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
</div>
<!--Add Listing ends-->
<!-- Scroll to top starts-->
<span class="scrolltotop"><i class="ion-arrow-up-c"></i></span>
<!-- Scroll to top ends-->
</div>
<!--Page Wrapper ends-->





<!--Scripts ends-->


    @endsection



    @push('jqueryCode')
    {{-- image show  --}}
<script>
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(".input-image-up").attr("src", e.target.result);
                $('.input-image-up').fadeIn(500);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".add-listing__input-file").change(function() {
        readURL(this);
    });


</script>
{{-- end image show  --}}
{{-- start tabs move --}}
    <script>
        $('.next').click(function () {
          $('html, body').animate({
                  scrollTop: $('#tabsContainer').offset().top
              }, 800);

              $('.nav-tabs > .nav-item.active').next('li').find('a').trigger('click');
              return false;

          });

        $('.previous').click(function(){
            $('html, body').animate({
                scrollTop: $('#tabsContainer').offset().top
            }, 800);
            $('.nav-tabs > .nav-item.active').prev('li').find('a').trigger('click');
            return false;
        });
      </script>
      {{-- end tabs move --}}
      {{-- start map --}}


      <?php

      if(isset($partner->id)){
                $lat = $partner->lat;
                $lng = $partner->lng;
            }else{
                $lat = 24.7136;
                $lng = 46.6753;
            }
        ?>


<script>

    if ($('#map').length > 0) {
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 15,

                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng({{$lat}}, {{$lng}}), // Riyadh

                scrollwheel: false,


                // How you would like to style the map.
                // This is where you would paste any style found on Snazzy Maps.
                styles: [
                    {
                        "featureType": "administrative",
                        "elementType": "geometry",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "administrative.land_parcel",
                        "elementType": "labels",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "labels",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    }
                ]
            };

            // Get the HTML DOM element that will contain your map
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('map');

            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);

            var image = "{{asset('front/images/others/marker.png')}}" ;
            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng({{$lat}}, {{$lng}}),
                map: map,
                icon: image,
                draggable: true,
                animation: google.maps.Animation.DROP,

            });




        marker.addListener('click', toggleBounce);

            function toggleBounce() {
                if (marker.getAnimation() !== null) {
                    marker.setAnimation(null);
                } else {
                    marker.setAnimation(google.maps.Animation.BOUNCE);
                }
            }
            let geocoder;
            google.maps.event.addListener(marker,'dragend',function (e) {
                console.log(marker.getPosition());
                geocoder = new google.maps.Geocoder();

                let lat = marker.getPosition().lat(),
                    lng = marker.getPosition().lng();



                var latlng = new google.maps.LatLng(lat,lng);

                geocoder.geocode({'latLng' : latlng},function (results, status) {

                    console.log( status,google.maps.GeocoderStatus  );

                    if (status == google.maps.GeocoderStatus.OK) {
                        console.log(results[1],lat,lng );

                        $('#lat').val(lat);
                        $('#lng').val(lng);
                        $('#map_address').val(results[1].formatted_address);
                        var addressC = results[1].address_components,
                            i;
                        for ( i =0;i<addressC.length;i++){
                            if (results[1].address_components[i].types[0] === "postal_code") {
                                $('#zipCode').val(results[1].address_components[i].long_name);
                            }
                        }

                    }
                });



            })
        }

    }

    // Intialize Map





</script>
      {{-- end map --}}

    @endpush
