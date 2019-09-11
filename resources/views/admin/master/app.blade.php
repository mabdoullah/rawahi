
<!DOCTYPE html>
<html direction="rtl" dir="rtl" style="direction: rtl" >
<!--Head starts-->
@include('admin.master.head')
<!--Head ends-->
<body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"  >
  @include('admin.master.header_phone')
  <div class="kt-grid kt-grid--hor kt-grid--root">
  		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        @include('admin.master.sidebar')

        <!--header starts-->
        @include('admin.master.header')
        <!--Header ends-->
        <!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        @yield('content')
      </div>
        <!--Footer Starts-->
        @include('admin.master.footer')
        <!--Footer ends-->
</body>
</html>
