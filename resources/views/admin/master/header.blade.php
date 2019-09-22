
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
    <!-- begin:: Header -->
<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed " >

<!-- begin:: Header Menu -->
<!-- Uncomment this to display the close button of the panel
<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
-->

<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">

<div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default "  >
</div>
</div>
<!-- end:: Header Menu -->
<!-- begin:: Header Topbar -->
<div class="kt-header__topbar">
<!--begin: Search -->

<!--end: Search -->

<!--begin: Notifications -->

<!--end: Notifications --><!--begin: Quick Actions -->

<div class="kt-header__topbar-item dropdown">
    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="30px,0px" aria-expanded="true">
        <span class="kt-header__topbar-icon">
    </div>
    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

<!--begin: Head -->

<!--end: Head -->

<!--begin: Grid Nav -->
<div class="kt-grid-nav kt-grid-nav--skin-light">
<div class="kt-grid-nav__row">
</div>
</div>
<!--end: Grid Nav --> 
    </div>
</div>
<!--end: Quick Actions -->
<!--begin: My Cart -->
<div class="kt-header__topbar-item dropdown">
<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="30px,0px" aria-expanded="true">
    <span class="kt-header__topbar-icon">
    </span>
</div>
<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
    <form>
        <!-- begin:: Mycart -->
<div class="kt-mycart">
        <div class="kt-mycart__head kt-head" style="background-image: url({{asset('admin/media/misc/bg-1.jpg')}});">
        <div class="kt-mycart__info">
            <span class="kt-mycart__icon"><i class="flaticon2-shopping-cart-1 kt-font-success"></i></span>
            <h3 class="kt-mycart__title">My Cart</h3>
        </div>
        <div class="kt-mycart__button">
            <button type="button" class="btn btn-success btn-sm" style=" ">2 Items</button>
        </div>
    </div>

<div class="kt-mycart__body kt-scroll" data-scroll="true" data-height="245" data-mobile-height="200">
    
    
</div>

<div class="kt-mycart__footer">
    
</div>
</div>
<!-- end:: Mycart -->        </form>
</div>
</div>
<!--end: My Cart --><!--begin: Quick panel toggler -->
<!--end: Quick panel toggler -->
<!--begin: Language bar -->

<!--end: Language bar --><!--begin: User Bar -->
<div class="kt-header__topbar-item kt-header__topbar-item--user">
    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
        <div class="kt-header__topbar-user">
        <span class="kt-header__topbar-welcome kt-hidden-mobile">مرحبا,</span>
        <span class="kt-header__topbar-username kt-hidden-mobile">{{adminUser()->name}}</span>
        <img class="kt-hidden" alt="Pic" src="{{asset('admin/media/users/300_25.jpg')}}" />
        
    </div>
</div>
<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround">
    <ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
        <li class="kt-nav__item kt-nav__item--active">
            <a href="{{url('admin/logout')}}" class="kt-nav__link">
                <span class="kt-nav__link-text">تسجيل خروج</span>
            </a>
        </li>
    </ul>
</div>
<!--end: Navigation -->

</div>
<!--end: User Bar -->
</div>
<!-- end:: Header Topbar --></div>
<!-- end:: Header -->
