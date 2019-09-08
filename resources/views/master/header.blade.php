<header class="header transparent scroll-hide">
    <!--Main Menu starts-->
    <div class="site-navbar-wrap v2">
        <div class="container">
            <div class="site-navbar">
                <div class="row align-items-center">
                    <div class="col-md-4 col-6">
                        <a class="navbar-brand" href="#"><img src="{{asset('images/logo-black.png')}}" alt="logo"
                                class="img-fluid"></a>
                    </div>
                    <div class="col-md-8 col-6">
                        <nav class="site-navigation float-left">
                            <div class="container">
                                <ul class="site-menu js-clone-nav d-none d-lg-block">
                                    <li class="has-children">
                                        <a href="index.html">الرئيسية</a>

                                    </li>
                                    <li class="has-children">
                                        <a href="#">تسجيل الدخول</a>
                                    </li>
                                    <li class="d-lg-none"><a class="btn v1" href="{{url('partner/create')}}">إضافة شريك
                                            <i class="ion-plus-round"></i></a></li>
                                    <li class="d-lg-none"><a class="btn v1 active" href="{{url('embssador/register')}}"> تسجيل سفير
                                            <i class="ion-plus-round"></i></a></li>
                                </ul>
                            </div>
                        </nav>
                        <div class="d-lg-none sm-left">
                            <a href="#" class="mobile-bar js-menu-toggle">
                                <span class="ion-android-menu"></span>
                            </a>
                        </div>
                        <div class="add-list float-left">
                            <a class="btn v8" href="{{url('partner/create')}}">إضافة شريك <i
                                    class="ion-plus-round"></i></a>
                            <a class="btn v8 active" href="{{url('embssador/register')}}">  تسجيل سفير <i
                                    class="ion-plus-round"></i></a>
                        </div>




                    </div>
                </div>
            </div>
            <!--mobile-menu starts -->
            <div class="site-mobile-menu">
                <div class="site-mobile-menu-header">
                    <div class="site-mobile-menu-close  js-menu-toggle">
                        <span class="ion-ios-close-empty"></span>
                    </div>
                </div>
                <div class="site-mobile-menu-body"></div>
            </div>
            <!--mobile-menu ends-->
        </div>
    </div>
    <!--Main Menu ends-->
</header>
