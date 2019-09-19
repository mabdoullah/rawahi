<script>
	(function(A) {

	if (!Array.prototype.forEach)
		A.forEach = A.forEach || function(action, that) {
			for (var i = 0, l = this.length; i < l; i++)
				if (i in this)
					action.call(that, this[i], i, this);
			};

		})(Array.prototype);

		var
		mapObject,
		markers = [],
		markersData = {
			'Marker': [
			{
				type_point: 'فندق',
				name: 'Ocean Paradise',
				location_latitude: 24.6951, 
				location_longitude: 46.6805,
				map_image_url: "{{asset('front/images/single-listing/gallery-6.jpg')}}",
				rate: '4.5',
				name_point: 'Ocean Paradise',
				url_point: '#',
				review: '13 reviews'
			},
			{
				type_point: 'سياحة',
				name: 'Hukair Theme Park',
				location_latitude: 24.695539,
				location_longitude: 46.685021,
				map_image_url: "{{asset('front/images/category/places/place-5.jpg')}}",
				rate: '4',
				name_point: 'Lagon Theme Park',
				url_point: '#',
				review: '12 reviews'
			},
			{
				type_point: 'مطعم',
				name: 'Genji Restaurent',
				location_latitude: 24.7136, 
				location_longitude: 46.6753,
				map_image_url: "{{asset('front/images/category/places/place-9.jpg')}}",
				rate: '5',
				name_point: 'Genji Restaurent',
				url_point: '#',
				review: '11 reviews'
			},
			{
				type_point: 'مجمع تجاري',
				name: 'صحارى مول',
				location_latitude: 24.6961,
				location_longitude: 46.6810,
				map_image_url: "{{asset('front/images/category/places/place-5.jpg')}}",
				rate: '3.5',
				name_point: 'صحارى مول',
				url_point: '#',
				review: '10 reviews'
			},
			{
				type_point: 'مقهى',
				name: 'Cafe Intermezzo',
				location_latitude: 24.6951, 
				location_longitude: 46.6805,
				map_image_url: "{{asset('front/images/category/places/cafe.jpg')}}",
				rate: '4.5',
				name_point: 'Cafe Intermezzo',
				url_point: '#',
				review: '9 reviews'
			},
			{
				type_point: 'فندق',
				name: 'Four Seasons Resort',
				location_latitude: 24.713552,
				location_longitude: 46.675296,
				map_image_url: "{{asset('front/images/category/places/place-1.jpg')}}",
				rate: '5',
				name_point: 'Four Seasons Resort',
				url_point: '#',
				review: '8 reviews'
			},
			{
				type_point: 'فعالية',
				name: 'Blue Men Show',
				location_latitude: 21.4858, 
				location_longitude: 39.1925,
				map_image_url: "{{asset('front/images/category/event/muay.jpg')}}",
				rate: '4',
				name_point: 'Blue Men Show',
				url_point: '#',
				review: '15 reviews'
			}
			
			]

		};

			var mapOptions = {
				zoom: 14,
				center: new google.maps.LatLng(24.7136, 46.6753),
				mapTypeId: google.maps.MapTypeId.ROADMAP,

				mapTypeControl: false,
				mapTypeControlOptions: {
					style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
					position: google.maps.ControlPosition.LEFT_CENTER
				},
				panControl: false,
				panControlOptions: {
					position: google.maps.ControlPosition.TOP_RIGHT
				},
				zoomControl: true,
				zoomControlOptions: {
					position: google.maps.ControlPosition.RIGHT_BOTTOM
				},
				scrollwheel: false,
				scaleControl: false,
				scaleControlOptions: {
					position: google.maps.ControlPosition.TOP_LEFT
				},
				streetViewControl: true,
				streetViewControlOptions: {
					position: google.maps.ControlPosition.LEFT_TOP
				},
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
			var marker;
			mapObject = new google.maps.Map(document.getElementById('map_right_listing'), mapOptions);
			for (var key in markersData)
				markersData[key].forEach(function (item) {
					marker = new google.maps.Marker({
						position: new google.maps.LatLng(item.location_latitude, item.location_longitude),
						map: mapObject,
						icon: "{{asset('front/images/others/marker.png')}}",
					});

					if ('undefined' === typeof markers[key])
						markers[key] = [];
					markers[key].push(marker);
					google.maps.event.addListener(marker, 'click', (function () {
				  closeInfoBox();
				  getInfoBox(item).open(mapObject, this);
				  mapObject.setCenter(new google.maps.LatLng(item.location_latitude, item.location_longitude));
				 }));

	});

	new MarkerClusterer(mapObject, markers[key]);
	
		function hideAllMarkers () {
			for (var key in markers)
				markers[key].forEach(function (marker) {
					marker.setMap(null);
				});
		};
	
	

		function closeInfoBox() {
			$('div.infoBox').remove();
		};

		function getInfoBox(item) {
			return new InfoBox({
				content:
				'<div class="marker_info" id="marker_info">' +
				'<img src="' + item.map_image_url + '" alt=""/>' +
				'<span>'+ 
					'<em>'+ item.type_point +'</em>' +
					'<h3><a href="'+item.url_point+'">'+ item.name_point +'</a></h3>' +
					'<span class="infobox_rate">'+ item.rate +'</span>' +
					'<span class="btn_infobox_reviews">'+ item.review +'</span>' +
					'</span>' +
				'</div>',
				disableAutoPan: false,
				maxWidth: 0,
				pixelOffset: new google.maps.Size(10, 92),
				closeBoxMargin: '',
				closeBoxURL: "{{asset('front/images/others/close_infobox.png')}}",
				isHidden: false,
				alignBottom: true,
				pane: 'floatPane',
				enableEventPropagation: true
			});
		};

	function onHtmlClick(location_type, key){
		google.maps.event.trigger(markers[location_type][key], "click");
	}

</script>