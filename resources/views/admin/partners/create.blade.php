@extends('admin.master.app')

@section('content')
<div class='row'>
        @if(session()->has('master_error'))
        <div class="alert alert-danger text-center" role="alert">
            {{ session()->get('master_error') }}
        </div>
        @endif
        @if(session()->has('message'))
        <div class="alert alert-success text-center" role="alert">
            {{ session()->get('message') }}
        </div>
        @endif
        <div class="col-md-12">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                تسجيل بيانات الشريك:-
                            </h3>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="kt-form kt-form--label-right" action="{{route('admin.partners.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="kt-portlet__body">
                            <div class="form-group row">
                                <div class="col-md-6 {{ $errors->has( 'name' ) ? 'has-error' : '' }}">
                                        <label>إسم الشريك</label>
                                    <input name="legal_name"  type="text" class="form-control filter-input"
                                        placeholder="الإسم التجاري للشريك" value="{{ old('legal_name') }}">

                                        @if( $errors->has( 'legal_name' ) )
                                               <span class="help-block text-danger">
                                                   {{ $errors->first( 'legal_name' ) }}
                                               </span>
                                        @endif
                                </div>
                               
                                        <div class="col-md-6">
                                                <div class="form-group {{ $errors->has( 'partner_type' ) ? 'has-error' : '' }}">
                                                        <label>الفئة</label>
                                                        <div  tabindex="0"><spanclass="current"></span>

                                                              <select class="form-control" name="partner_type"  id="partner_type" >
                                                                    <option selected disabled > اختر الفئة</option>
                                                                 @foreach (partnersTypesArray() as $key => $value)
                                                                       <option  value="{{$key}}">{{$value}}</option>
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
                                <div class="col-md-6">
                                        <div class="form-group {{ $errors->has( 'email' ) ? 'has-error' : '' }}">
                                            <label> البريد الالكتروني</label>
                                            <input required type="email" class="form-control " placeholder="البريد الالكتروني " name="email" value="{{ old('email')}}">
                                            @if( $errors->has( 'email' ) )
                                            <span class="help-block text-danger">
                                                {{ $errors->first( 'email' ) }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-group {{ $errors->has( 'ambassdor' ) ? 'has-error' : '' }}">
                                                    <label> السفير </label>
                                                    <select class="form-control filter-input"  name="ambassador_id" id="ambassador_id">
                                                        <option value="0">اختر السفير</option>
                                                        @foreach ($ambassadors as $ambassdor)
                
                                                            <option   @if( old('ambassdor')==$ambassdor->id) selected @endif value="{{$ambassdor->id}}">
                                                            {{$ambassdor->first_name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                
                                                    @if( $errors->has( 'ambassdor' ) )
                                                            <span class="help-block text-danger">
                                                                {{ $errors->first( 'ambassdor' ) }}
                                                            </span>
                                                        @endif
                                                </div>
                        
                        
                                               </div>
                                    <div class="col-md-12">
                                            <div class="form-group {{ $errors->has( 'email' ) ? 'has-error' : '' }}">
                                            <label>نوع الاشتراك</label>
                                                <div   class="filter-checkbox">
                                                <input  type="checkbox"  id="check-a"  name="subscription_type"   value="{{old('subscription_type') }}">

                                            <label for="check-a">1 year 3000 USD</label>
                                            @if( $errors->has( 'subscription_type' ) )
                                               <span class="help-block text-danger">
                                                   {{ $errors->first( 'subscription_type' ) }}
                                               </span>
                                           @endif
                                            </div>
                                        </div>
                                        
                            </div>
                            <div class="col-md-12">
                                    <div class="form-group {{ $errors->has( 'email' ) ? 'has-error' : '' }}">
                                            <label for="list_info" >وصف الشريك</label>
                                            <textarea name="about" placeholder="أدخل وصف بسيط بخدمات الشريك" class="form-control" id="list_info"  rows="4">{{old('about') }}</textarea>
                                            @if( $errors->has( 'about' ) )
                                            <span class="help-block text-danger">
                                                {{ $errors->first( 'about' ) }}
                                            </span>
                                            @endif
                                    </div>
                                </div>
                                
                    
                    <div class="col-md-6">
                            <div class="form-group {{ $errors->has( 'email' ) ? 'has-error' : '' }}">
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
                    <div class="form-group {{ $errors->has( 'email' ) ? 'has-error' : '' }}">
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
            </div>
            <div class="col-md-12">
                    <h4><i class="ion-image"></i> الشعار </h4>
                    <div class="form-group">
                        <form class="photo-upload">
                           <div class="form-group {{ $errors->has( 'image' ) ? 'has-error' : '' }}">
                                <div class="add-listing__input-file-box">

                                        <input class="add-listing__input-file" type="file" name="image"
                                        id="file" onchange="readURL(this);"  value="{{ old('image') }}">

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

                       </div>
                       <div class="col-md-12">
                            <h4><i class="ion-ios-location"></i> الموقع وبيانات الاتصال:</h4>
                        </div>

                       <div class="col-md-6">
                            <div class="form-group {{ $errors->has( 'city' ) ? 'has-error' : '' }}">
                                    <label> المدينه </label>
                                    <select class="form-control filter-input"  name="city" id="city">
                                        <option value="0">اختر المدينة</option>
                                        @foreach ($cities as $city)

                                            <option   @if( old('city')==$city->id) selected @endif value="{{$city->id}}">
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
                                    <input name="phone"  type="text" class="form-control filter-input" value="{{ old('phone') }}">

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
                                            placeholder="ex. 250, Olayya Street..." value="{{ old('map_address') }}">
    
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
                                        placeholder="ex. 5858"  value="{{ old('postel_code') }}">

                                        @if( $errors->has( 'postel_code' ) )
                                        <span class="help-block text-danger">
                                            {{ $errors->first( 'postel_code' ) }}
                                        </span>
                                        @endif
                                </div>
                           
         
                 </div>
                 <div class="col-md-6">
                        <div class="form-group {{ $errors->has( 'lat' ) ? 'has-error' : '' }}">
                                <input name="lat" type="hidden" id="lat" class="form-control filter-input" value="{{ old('lat') }}">
                                     
                            </div>
                       
     
             </div>
             <div class="col-md-6">
                   
                    <div class="form-group {{ $errors->has( 'lng' ) ? 'has-error' : '' }}">
                            <input name="lng" type="hidden" id="lng" class="form-control filter-input"
                                 value="{{ old('lng',
                                isset($partner->lng) ? $partner->lng : '') }}" >
                        </div>
 
              </div>
           
                  
              <div class="col-md-12">
                   
                    <div id="map" style="width: 100%;height: 250px;position: relative;overflow: hidden;"></div>
 
              </div>
              <div class="col-md-6">
                    <input type="hidden" >
                  </div>
                  <div class="col-md-6">
                        <input type="hidden" >
                      </div>
              <div class="col-md-4">
                    <div class="form-group {{ $errors->has( 'facebook' ) ? 'has-error' : '' }}">
                            <label>الفيسبوك - اختياري</label>
                            <input  type="text" name="facebook" class="form-control filter-input"
                                placeholder="رابط الفيسبوك" value="{{ old('facebook') }}">
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
                                placeholder="رابط الانستغرام" value="{{ old('instagram')}}">
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
              <div class="col-md-12">
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
                    <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" >حفظ وتسجيل</button>
                    </div>
                   </div> 
                </form> 
             </div>
                      
        </div>
    </div>
           
     

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
    
                var image = "{{asset('front/images/others/Marker.png')}}" ;
                // Let's also add a marker while we're at it
                var marker = new google.maps.Marker(
                    {
                    position: new google.maps.LatLng({{$lat}}, {{$lng}}),
                    map: map,
                    icon: image,
                    draggable: true,
                    animation: google.maps.Animation.DROP,
    
                    }
                );
                
               
    
    
                
    
    
            marker.addListener('click', toggleBounce);
    
                function toggleBounce() {
                    if (marker.getAnimation() !== null) {
                        marker.setAnimation(null);
                    } else {
                        marker.setAnimation(google.maps.Animation.BOUNCE);
                    }
                }
    
    
                var geocoder = new google.maps.Geocoder();
                google.maps.event.addListener(marker,'dragend',function (e) {
                    // console.log(marker.getPosition());
                    
                   
                    setValuesToInputs(marker);
    
                });
    
    
    
    
    
    
    
    
    
    
    
    
    
                        
                function setValuesToInputs(marker){
                    
    
                    let lat = marker.getPosition().lat(),
                        lng = marker.getPosition().lng();
                        
    
    
                    var latlng = new google.maps.LatLng(lat,lng);
    
                    geocoder.geocode({'latLng' : latlng},function (results, status) {
                        
                        // var addresslocation =results[1].formatted_address;
    
                        // console.log( status,google.maps.GeocoderStatus  );
    
                        if (status == google.maps.GeocoderStatus.OK) {
                            // console.log(results[1],lat,lng );
    
                            $('#lat').val(lat);
                            $('#lng').val(lng);
                            let map_address = '' ,addressC='',postal_code='';
    
                            if (typeof results[1] !== 'undefined') {
                                if(typeof results[1].formatted_address !== 'undefined'){
                                    map_address = results[1].formatted_address;
                                }
    
                                if(typeof results[1].address_components !== 'undefined'){
                                    addressC = results[1].address_components
    
                                    for (let i =0;i<addressC.length;i++){
                                        if (addressC[i].types[0] === "postal_code") {
                                            postal_code  = addressC[i].long_name;
                                        }
                                    }
    
                                }
                            }
                            
                            $('#map_address').val(map_address);
                            
                            $('#zipCode').val(postal_code);
                           
                        }
                        
                    });
                }
               
    
    
    
                @if(!isset($partner->id))
            
                    //infoWindow = new google.maps.InfoWindow;
    
                    // Try HTML5 geolocation.
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function(position) {
                            // console.log('position',position);
                            var pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                            };
    
                            // infoWindow.setPosition(pos);
                            // infoWindow.setContent( addresslocation);
                            marker.setPosition(pos);
                            // infoWindow.open(map, marker);
    
                            map.setCenter(pos);
    
    
                            setValuesToInputs(marker);
    
                        }, function() {
                            //handleLocationError(true, infoWindow, map.getCenter());
                        });
                    } else {
                        // Browser doesn't support Geolocation
                        //  handleLocationError(false, infoWindow, map.getCenter());
                    }
    
    
                    // function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                    //     infoWindow.setPosition(pos);
                    //     infoWindow.setContent(browserHasGeolocation ?
                    //                         'Error: The Geolocation service failed.' :
                    //                         'Error: Your browser doesn\'t support geolocation.');
                    //     infoWindow.open(map);
                    // }
    
                @endif
    
    
    
    
            }
    
        }
    
        // Intialize Map
    
    
    
    
    
    </script>
       


{{-- end map --}}
@endpush