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
                        تعديل بيانات الشريك :-
                            </h3>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="kt-form kt-form--label-right" action="{{route('admin.partners.update',$partner->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="kt-portlet__body">
                            <div class="form-group row">
                                <div class="col-md-6 {{ $errors->has( 'legal_name' ) ? 'has-error' : '' }}">
                                        <label>إسم الشريك</label>
                                    <input name="legal_name"  type="text" class="form-control filter-input"
                                        placeholder="الإسم التجاري للشريك" value="{{old('legal_name',$partner->legal_name)}}">
                                        @if( $errors->has( 'legal_name' ) )
                                               <span class="help-block text-danger">
                                                   {{ $errors->first( 'legal_name' ) }}
                                               </span>
                                        @endif
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group {{ $errors->has( 'partner_type' ) ? 'has-error' : '' }}">
                                      <label>الفئة</label>
                                        <div  tabindex="0"><span class="current"></span>
                                            <select class="form-control" name="partner_type"  id="partner_type" >
                                              <option selected disabled > اختر الفئة</option>
                                               @foreach (partnersTypesArray() as $key => $value)
                                               <option {{(old('partner_type',$partner->partner_type) == $key ) ? 'selected':''  }} value="{{$key}}">{{$value}}</option>
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
                            <div class="col-md-12">
                                    <div class="form-group {{ $errors->has( 'email' ) ? 'has-error' : '' }}">
                                        <label> البريد الالكتروني</label>
                                        <input required type="text" class="form-control " placeholder="البريد الالكتروني " dir="ltr" style="text-align:right"   name="email" value="{{old('email',$partner->email)}}">
                                        @if( $errors->has( 'email' ) )
                                        <span class="help-block text-danger">
                                            {{ $errors->first( 'email' ) }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-6">
                                <label> اختر الوكيل </label>
                                    <select class="form-control form-group" name="agent" id="agent">
                                    <option value="" selected>اختر الوكيل</option>
                        
                                    @foreach($agents as $agent)
                                    <option value="{{$agent->id}}" @if ($agent->id == $agent_id) selected="selected" @endif>{{$agent->name}}</option>
                                    @endforeach
                                    </select>
                        
                                    @if( $errors->has( 'agent' ) )
                                    <span class="help-block text-danger">
                                      {{ $errors->first( 'agent' ) }}
                                    </span>
                                    @endif
                                  
                                    </div> 
                        
                                     <div class="col-6">
                                     <label> اختر السفير </label>
                                    <select class="form-control form-group" name="ambassador" id="ambassador">
                        
                                        <option value="">اختر السفير </option>
                                        @foreach ($ambassadors as $ambassador)
                                            
                                        
                                        <option value="{{$ambassador->id}}" @if ($ambassador->id == $agent_id) selected="selected" @endif> {{$ambassador->first_name}}</option>
                                        @endforeach
                                    </select>
                            
                                        @if( $errors->has( 'ambassador' ) )
                                        <span class="help-block text-danger">
                                          {{ $errors->first( 'ambassador' ) }}
                                        </span>
                                        @endif 
                                        </div> 
                                  <div class="col-md-12">
                                          <div class="form-group {{ $errors->has( 'subscription_type' ) ? 'has-error' : '' }}">
                                          <label>نوع الاشتراك</label>
                                              <div   class="filter-checkbox">
                                              <input  type="checkbox"  id="check-a"  name="subscription_type"   value="{{old('subscription_type',$partner->subscription_type) }}">
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
                                    <div class="form-group {{ $errors->has( 'about' ) ? 'has-error' : '' }}">
                                        <label for="list_info" >وصف الشريك</label>
                                        <textarea name="about" placeholder="أدخل وصف بسيط بخدمات الشريك" class="form-control" id="list_info"  rows="4">{{old('about',$partner->about)}}</textarea>
                                        @if( $errors->has( 'about' ) )
                                        <span class="help-block text-danger">
                                            {{ $errors->first( 'about' ) }}
                                        </span>
                                        @endif
                                     </div>
                                 </div>
                                <div class="col-md-12">
                                  <h4><i class="ion-image"></i> الشعار </h4>
                                    <div class="form-group">
                                      <div class="photo-upload">
                                         <div class="form-group {{ $errors->has( 'image' ) ? 'has-error' : '' }}">
                                            <div class="add-listing__input-file-box">
                                                <input class="add-listing__input-file" type="file" name="image" id="file" onchange="readURL(this);"  value="{{ old('image',$partner->images) }}">
                                                <div class="add-listing__input-file-wrap">
                                                  <i class="ion-ios-cloud-upload"></i>
                                                  <p>إضغط هنا لرفع الشعار</p>
                                                  <img id ='myImageupload' class="input-image-up logo-partner"  src="@if($partner->image){{asset('images/partners/'.$partner->image)}} @endif" alt="image"/>
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
                              </div>
                               <div class="col-md-12">
                                    <h4><i class="ion-ios-location"></i> الموقع وبيانات الاتصال:</h4>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group {{ $errors->has( 'city' ) ? 'has-error' : '' }}">
                                      <label> المدينه </label>
                                      <select class="form-control filter-input"  name="city" id="city">
                                          <option value="">اختر المدينة</option>
                                          @foreach ($cities as $city)
                                              <option   @if( old('city',$partner->city)==$city->id) selected @endif value="{{$city->id}}">
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
                                    <input name="phone"  type="text" class="form-control filter-input" value="{{ old('phone',$partner->phone) }}">
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
                            <input name="map_address" id="map_address"  type="text" class="form-control filter-input"placeholder="ex. 250, Olayya Street..." value="{{ old('map_address',$partner->map_address) }}">
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
                              placeholder="ex. 5858"  value="{{ old('postel_code',$partner->postel_code) }}"
                              @if( $errors->has( 'postel_code' ) )
                              <span class="help-block text-danger">
                                  {{ $errors->first( 'postel_code' ) }}
                              </span>
                              @endif
                        </div>
                      </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group {{ $errors->has( 'lat' ) ? 'has-error' : '' }}">
                            <input name="lat" type="hidden" id="lat" class="form-control filter-input" value="{{ old('lat',$partner->lat) }}">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group {{ $errors->has( 'lng' ) ? 'has-error' : '' }}">
                            <input name="lng" type="hidden" id="lng" class="form-control filter-input"value="{{ old('lng',$partner->lng) }}" >
                        </div>
                      </div>
                      <div class="col-md-12 form-group">
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
                                  placeholder="رابط الفيسبوك" value="{{ old('facebook',$partner->facebook) }}">
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
                              placeholder="رابط الانستغرام" value="{{ old('instagram',$partner->instagram)}}">
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
                            placeholder="رابط التويتر" value="{{ old('twitter',$partner->twitter) }}">
                            @if( $errors->has( 'twitter' ) )
                            <span class="help-block text-danger">
                                {{ $errors->first( 'twitter' ) }}
                            </span>
                            @endif
                      </div>
                    </div>
                    <div class="col-md-12">
                      <input  type="checkbox"  tabindex="3" class="" name="remember" id="remember" value='1'>
                      <label for="remember">أوافق على <a href="terms.html">الشروط    والأحكام</a></label>
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
</div>



@endsection
@push('jqueryCode')
{{-- image show  --}}
<script>
var imgSource = document.getElementById('myImageupload').src ;
$('.input-image-up[src=""]').hide();
$('.input-image-up:not([src=""])').show();
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(".input-image-up").attr("src", e.target.result);
            $('.input-image-up').fadeIn(500);
        }
        reader.readAsDataURL(input.files[0]);
        $('.input-image-up').css('display', 'block');
    }
}
$(".add-listing__input-file").change(function() {
    readURL(this);
});


</script>
{{-- end image show  --}}

      {{-- start map --}}


<?php

      if(isset($partner->lat) && isset($partner->lng)){
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
<script >

    $('#agent').change(function(){
        var agentID = $(this).val(); 
         if(agentID){
                $.ajax({
                   type:"GET",
                   url:"{{url('admin/get-ambassador-list')}}?agent_id="+agentID,
                   success:function(res){
                      $("#ambassador").empty();
                      if(res){
                          $("#ambassador").append("<option value=''>اختر السفير</option>");
                          $.each(res,function(key,value){
                              $("#ambassador").append("<option value='"+key+"'>"+value+"</option>");
                          });
                      }
                   }
                });
        }else{
            $("#ambassador").empty();
            $("#agent").empty();
        }
       });
     
    
    
    
       
    </script>

@endpush
