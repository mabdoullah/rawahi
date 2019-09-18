<header class="header transparent scroll-hide">
    <!--Main Menu starts-->
    <div class="site-navbar-wrap v2">
        <div class="container">
            <div class="site-navbar">
                <div class="row align-items-center">
                    <div class="col-md-4 col-6 text-center">
                        <a class="navbar-brand" href="{{route('index')}}"><img src="{{asset('front/images/logo-black.png')}}" alt="logo"
                                class="img-fluid"></a>
                    </div>
                    <div class="col-md-8 col-6">
                        <nav class="site-navigation float-left">
                            <div class="container">
                                <ul class="site-menu js-clone-nav d-none d-lg-block">
                                    <li class="has-children">
                                        <a href="{{route('index')}}">الرئيسية</a>
                                    </li>

                                    @if(currentUser())
                                    <li class="has-children ">
                                        <a href="javascript:;">
                                            {{(currentUser()->name)?? (currentUser()->first_name ?? currentUser()->legal_name)}}
                                        </a>
                                        <ul class="dropdown">
                                            <li><a href="{{url('logout')}}">تسجيل خروج</a></li>
                                        </ul>
                                    </li>

                                    @else
                                        <li class="has-children"><a  href="{{url('login')}}">تسجيل الدخول</a></li>
                                    @endif


                                    @if(embassadorUser())
                                    <li class="d-lg-none"><a class="btn v1" href="{{route('partners.edit',embassadorUser()->id)}}">تعديل البروفيل                                          </a></li>
                                    <li class="d-lg-none"><a class="btn v1" href="{{route('partners.create')}}">إضافة شريك
                                            <i class="ion-plus-round"></i></a></li>
                                    <li class="d-lg-none"><a class="btn v1" href="{{route('partners.index')}}">الشركاء
                                    </a></li>
                                    @endif
                                    @if(agentUser())
                                    <li class="d-lg-none"><a class="btn v1 active" href="{{route('embassador.create')}}"> تسجيل سفير
                                            <i class="ion-plus-round"></i></a></li>
                                    <li class="d-lg-none"><a class="btn v1 active" href="{{route('embassador.index')}}">السفراء
                                              </a></li>
                                    @endif
                                </ul>
                            </div>
                        </nav>
                        <div class="d-lg-none sm-left">
                            <a href="#" class="mobile-bar js-menu-toggle">
                                <span class="ion-android-menu"></span>
                            </a>
                        </div>
                        <div class="add-list float-left">
                            @if(embassadorUser())
                            <a class="btn v8"  href="{{route('embassador.edit',embassadorUser()->id)}}">تعديل البروفيل </a>
                                <a class="btn v8" href="{{route('partners.create')}}">إضافة شريك <i
                                    class="ion-plus-round"></i></a>
                                    <a class="btn v8" href="{{route('partners.index')}}">الشركاء </a>
                            @endif
                            @if(agentUser())
                                <a class="btn v8" href="{{route('embassador.create')}}">  تسجيل سفير <i
                                class="ion-plus-round"></i></a>
                                <a class="btn v8" href="{{route('embassador.index')}}">  السفراء </a>
                            @endif


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
