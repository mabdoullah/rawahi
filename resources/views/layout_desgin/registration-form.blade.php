@extends('master.headerandfooter')

@section('content')


    <!--Page Wrapper starts-->
    <div class="page-wrapper fixed-footer">
        <!--header starts-->
        <header class="header transparent scroll-hide">
            <!--Main Menu starts-->
            <div class="site-navbar-wrap v2">
                <div class="container">
                    <div class="site-navbar">
                        <div class="row align-items-center">
                            <div class="col-md-4 col-6">
                                <a class="navbar-brand" href="#"><img src="images/logo-black.png" alt="logo"
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
                                            <li class="d-lg-none"><a class="btn v1" href="add-listing.html">إضافة شريك
                                                    <i class="ion-plus-round"></i></a></li>
                                            <li class="d-lg-none"><a class="btn v1 active" href="#"> تسجيل سفير
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
                                    <a class="btn v8" href="add-listing.html">إضافة شريك <i
                                            class="ion-plus-round"></i></a>
                                    <a class="btn v8 active" href="#">  تسجيل سفير <i
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
        <!--Header ends-->
        <!--Breadcrumb section starts-->
        <div class="breadcrumb-section" style="background-image: url(images/breadcrumb/breadcrumb-1.jpg)">
            <div class="overlay op-5"></div>
            <div class="container">
                <div class="row align-items-center  pad-top-80">
                    <div class="col-md-6 col-12">
                        <div class="breadcrumb-menu text-left sm-left">
                            <ul>
                                <li class="active"><a href="#">الرئيسية</a></li>
                                <li><a href="#">إضافة شريك</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="breadcrumb-menu">
                            <h2 class="page-title text-right">إضافة شريك</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Breadcrumb section ends-->
        <!--Add Listing starts-->
        <div class="list-details-section section-padding add_list pad-top-90">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs list-details-tab">
                            <li class="nav-item active">
                                <a data-toggle="tab" href="#general_info">بيانات السفير</a>
                            </li>
                            <!-- <li class="nav-item ">
                                <a data-toggle="tab" href="#gallery">الشعار</a>
                            </li>
                            <li class="nav-item">
                                <a data-toggle="tab" href="#location">الموقع وبيانات الاتصال<span
                                        class="text-grey"></span></a>
                            </li>
                            <li class="nav-item">
                                <a data-toggle="tab" href="#open_time">ساعات العمل</a>
                            </li>

                            <li class="nav-item">
                                <a data-toggle="tab" href="#social_network">حسابات التواصل الاجتماعي <span
                                        class="text-grey"></span></a>
                            </li> -->
                        </ul>
                        <div class="tab-content mar-tb-30 add_list_content">
                            <div class="tab-pane fade show active" id="general_info">
                                <h4> <i class="ion-ios-information"></i> بيانات السفير:</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> الاسم الاول</label>
                                            <input required type="text" class="form-control filter-input"
                                                placeholder="الإسم الاول">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> الاسم الاخير</label>
                                            <input required type="text" class="form-control filter-input"
                                                placeholder="الإسم الاخير ">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>  البريد الالكتروني</label>
                                            <input required type="email" class="form-control filter-input"
                                                placeholder="البريد الالكتروني ">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>  رقم الجوال</label>
                                            <input required type="number" class="form-control filter-input"
                                                placeholder="رقم الجوال">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>الدوله</label>
                                            <input required type="text" class="form-control filter-input"
                                                placeholder="الدوله">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> المدينه </label>
                                            <input required type="text" class="form-control filter-input"
                                                placeholder="المدينه  ">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>  كلمه السر </label>
                                            <input required type="text" class="form-control filter-input"
                                                placeholder="كلمه السر">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> تاكيد كلمه السر </label>
                                            <input required type="text" class="form-control filter-input"
                                                placeholder="تاكيد كلمه السر  ">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label> تاريخ الميلاد</label>
                                            <input required type="date" class="form-control filter-input"
                                                placeholder="  تاريخ الميلاد">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#" class="btn v7 mar-top-20">حفظ ومتابعة</a>
                                    </div>

                                </div>
                            </div>
                            <!-- <div class="tab-pane fade" id="gallery">
                                <h4><i class="ion-image"></i> الشعار :</h4>
                                <div class="form-group">
                                    <form class="photo-upload">
                                        <div class="form-group">
                                            <div class="add-listing__input-file-box">
                                                <input required class="add-listing__input-file" type="file" name="file"
                                                    id="file">
                                                <div class="add-listing__input-file-wrap">
                                                    <i class="ion-ios-cloud-upload"></i>
                                                    <p>إضغط هنا لرفع الشعار</p>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="add-btn">
                                    <a href="#" class="btn v8 mar-top-20">حفظ ومتابعة</a>
                                </div>
                            </div> -->
                            <!-- <div class="tab-pane fade" id="location">
                                <h4><i class="ion-ios-location"></i> الموقع وبيانات الاتصال:</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>اختر الدولة</label>
                                            <div class="nice-select filter-input" tabindex="0"><span
                                                    class="current">اختر الدولة</span>
                                                <ul class="list">
                                                    <li class="option selected focus">السعودية</li>
                                                    <li class="option">الامارات</li>
                                                    <li class="option">الكويت</li>
                                                    <li class="option">مصر</li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>العنوان</label>
                                            <input required type="text" class="form-control filter-input"
                                                placeholder="ex. 250, Olayya Street...">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>المدينة</label>
                                            <input required type="text" class="form-control filter-input"
                                                placeholder="اختر المدينة">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>الرمز البريدي</label>
                                            <input required type="number" class="form-control filter-input" placeholder="ex. 5858">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
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
                                    </div>
                                    <div class="col-md-12 no-padding">
                                        <div id="map"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mar-top-15">
                                            <label>الموقع الالكتروني </label>
                                            <input required type="text" class="form-control filter-input">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mar-top-15">
                                            <label>الجوال </label>
                                            <input required type="number" class="form-control filter-input">
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <!-- <div class="tab-pane fade" id="open_time">
                                <h4><i class="ion-clock"></i> ساعات العمل:</h4>
                                <div class="row mar-bot-30">
                                    <div class="col-md-2">
                                        <label class="fix_spacing">الأحد</label>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="nice-select filter-input" tabindex="0"><span
                                                class="current">من</span>
                                            <ul class="list">
                                                <li class="option selected focus">7.00 am</li>
                                                <li class="option">8.00 am</li>
                                                <li class="option">9.00 am</li>
                                                <li class="option">10.00 am</li>
                                                <li class="option">11.00 am</li>
                                                <li class="option">12.00 am</li>
                                                <li class="option">1.00 pm</li>
                                                <li class="option">2.00 pm</li>
                                                <li class="option">3.00 pm</li>
                                                <li class="option">4.00 pm</li>
                                                <li class="option">5.00 pm</li>
                                                <li class="option">6.00 pm</li>
                                                <li class="option">7.00 pm</li>
                                                <li class="option">8.00 pm</li>
                                                <li class="option">9.00 pm</li>
                                                <li class="option">10.00 pm</li>
                                                <li class="option">11.00 pm</li>
                                                <li class="option">12.00 pm</li>
                                                <li class="option">00.00 am</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="nice-select filter-input" tabindex="0"><span
                                                class="current">إلى</span>
                                            <ul class="list">
                                                <li class="option selected focus">7.00 am</li>
                                                <li class="option">8.00 am</li>
                                                <li class="option">9.00 am</li>
                                                <li class="option">10.00 am</li>
                                                <li class="option">11.00 am</li>
                                                <li class="option">12.00 am</li>
                                                <li class="option">1.00 pm</li>
                                                <li class="option">2.00 pm</li>
                                                <li class="option">3.00 pm</li>
                                                <li class="option">4.00 pm</li>
                                                <li class="option">5.00 pm</li>
                                                <li class="option">6.00 pm</li>
                                                <li class="option">7.00 pm</li>
                                                <li class="option">8.00 pm</li>
                                                <li class="option">9.00 pm</li>
                                                <li class="option">10.00 pm</li>
                                                <li class="option">11.00 pm</li>
                                                <li class="option">12.00 pm</li>
                                                <li class="option">00.00 am</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mar-bot-30">
                                    <div class="col-md-2">
                                        <label class="fix_spacing">الإثنين</label>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="nice-select filter-input" tabindex="0"><span
                                                class="current">من</span>
                                            <ul class="list">
                                                <li class="option selected focus">7.00 am</li>
                                                <li class="option">8.00 am</li>
                                                <li class="option">9.00 am</li>
                                                <li class="option">10.00 am</li>
                                                <li class="option">11.00 am</li>
                                                <li class="option">12.00 am</li>
                                                <li class="option">1.00 pm</li>
                                                <li class="option">2.00 pm</li>
                                                <li class="option">3.00 pm</li>
                                                <li class="option">4.00 pm</li>
                                                <li class="option">5.00 pm</li>
                                                <li class="option">6.00 pm</li>
                                                <li class="option">7.00 pm</li>
                                                <li class="option">8.00 pm</li>
                                                <li class="option">9.00 pm</li>
                                                <li class="option">10.00 pm</li>
                                                <li class="option">11.00 pm</li>
                                                <li class="option">12.00 pm</li>
                                                <li class="option">00.00 am</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="nice-select filter-input" tabindex="0"><span
                                                class="current">إلى</span>
                                            <ul class="list">
                                                <li class="option selected focus">7.00 am</li>
                                                <li class="option">8.00 am</li>
                                                <li class="option">9.00 am</li>
                                                <li class="option">10.00 am</li>
                                                <li class="option">11.00 am</li>
                                                <li class="option">12.00 am</li>
                                                <li class="option">1.00 pm</li>
                                                <li class="option">2.00 pm</li>
                                                <li class="option">3.00 pm</li>
                                                <li class="option">4.00 pm</li>
                                                <li class="option">5.00 pm</li>
                                                <li class="option">6.00 pm</li>
                                                <li class="option">7.00 pm</li>
                                                <li class="option">8.00 pm</li>
                                                <li class="option">9.00 pm</li>
                                                <li class="option">10.00 pm</li>
                                                <li class="option">11.00 pm</li>
                                                <li class="option">12.00 pm</li>
                                                <li class="option">00.00 am</li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="row mar-bot-30">
                                    <div class="col-md-2">
                                        <label class="fix_spacing">الثلاثاء</label>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="nice-select filter-input" tabindex="0"><span
                                                class="current">من</span>
                                            <ul class="list">
                                                <li class="option selected focus">7.00 am</li>
                                                <li class="option">8.00 am</li>
                                                <li class="option">9.00 am</li>
                                                <li class="option">10.00 am</li>
                                                <li class="option">11.00 am</li>
                                                <li class="option">12.00 am</li>
                                                <li class="option">1.00 pm</li>
                                                <li class="option">2.00 pm</li>
                                                <li class="option">3.00 pm</li>
                                                <li class="option">4.00 pm</li>
                                                <li class="option">5.00 pm</li>
                                                <li class="option">6.00 pm</li>
                                                <li class="option">7.00 pm</li>
                                                <li class="option">8.00 pm</li>
                                                <li class="option">9.00 pm</li>
                                                <li class="option">10.00 pm</li>
                                                <li class="option">11.00 pm</li>
                                                <li class="option">12.00 pm</li>
                                                <li class="option">00.00 am</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="nice-select filter-input" tabindex="0"><span
                                                class="current">إلى</span>
                                            <ul class="list">
                                                <li class="option selected focus">7.00 am</li>
                                                <li class="option">8.00 am</li>
                                                <li class="option">9.00 am</li>
                                                <li class="option">10.00 am</li>
                                                <li class="option">11.00 am</li>
                                                <li class="option">12.00 am</li>
                                                <li class="option">1.00 pm</li>
                                                <li class="option">2.00 pm</li>
                                                <li class="option">3.00 pm</li>
                                                <li class="option">4.00 pm</li>
                                                <li class="option">5.00 pm</li>
                                                <li class="option">6.00 pm</li>
                                                <li class="option">7.00 pm</li>
                                                <li class="option">8.00 pm</li>
                                                <li class="option">9.00 pm</li>
                                                <li class="option">10.00 pm</li>
                                                <li class="option">11.00 pm</li>
                                                <li class="option">12.00 pm</li>
                                                <li class="option">00.00 am</li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="row mar-bot-30">
                                    <div class="col-md-2">
                                        <label class="fix_spacing">الأربعاء</label>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="nice-select filter-input" tabindex="0"><span
                                                class="current">من</span>
                                            <ul class="list">
                                                <li class="option selected focus">7.00 am</li>
                                                <li class="option">8.00 am</li>
                                                <li class="option">9.00 am</li>
                                                <li class="option">10.00 am</li>
                                                <li class="option">11.00 am</li>
                                                <li class="option">12.00 am</li>
                                                <li class="option">1.00 pm</li>
                                                <li class="option">2.00 pm</li>
                                                <li class="option">3.00 pm</li>
                                                <li class="option">4.00 pm</li>
                                                <li class="option">5.00 pm</li>
                                                <li class="option">6.00 pm</li>
                                                <li class="option">7.00 pm</li>
                                                <li class="option">8.00 pm</li>
                                                <li class="option">9.00 pm</li>
                                                <li class="option">10.00 pm</li>
                                                <li class="option">11.00 pm</li>
                                                <li class="option">12.00 pm</li>
                                                <li class="option">00.00 am</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="nice-select filter-input" tabindex="0"><span
                                                class="current">إلى</span>
                                            <ul class="list">
                                                <li class="option selected focus">7.00 am</li>
                                                <li class="option">8.00 am</li>
                                                <li class="option">9.00 am</li>
                                                <li class="option">10.00 am</li>
                                                <li class="option">11.00 am</li>
                                                <li class="option">12.00 am</li>
                                                <li class="option">1.00 pm</li>
                                                <li class="option">2.00 pm</li>
                                                <li class="option">3.00 pm</li>
                                                <li class="option">4.00 pm</li>
                                                <li class="option">5.00 pm</li>
                                                <li class="option">6.00 pm</li>
                                                <li class="option">7.00 pm</li>
                                                <li class="option">8.00 pm</li>
                                                <li class="option">9.00 pm</li>
                                                <li class="option">10.00 pm</li>
                                                <li class="option">11.00 pm</li>
                                                <li class="option">12.00 pm</li>
                                                <li class="option">00.00 am</li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="row mar-bot-30">
                                    <div class="col-md-2">
                                        <label class="fix_spacing">الخميس</label>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="nice-select filter-input" tabindex="0"><span
                                                class="current">من</span>
                                            <ul class="list">
                                                <li class="option selected focus">7.00 am</li>
                                                <li class="option">8.00 am</li>
                                                <li class="option">9.00 am</li>
                                                <li class="option">10.00 am</li>
                                                <li class="option">11.00 am</li>
                                                <li class="option">12.00 am</li>
                                                <li class="option">1.00 pm</li>
                                                <li class="option">2.00 pm</li>
                                                <li class="option">3.00 pm</li>
                                                <li class="option">4.00 pm</li>
                                                <li class="option">5.00 pm</li>
                                                <li class="option">6.00 pm</li>
                                                <li class="option">7.00 pm</li>
                                                <li class="option">8.00 pm</li>
                                                <li class="option">9.00 pm</li>
                                                <li class="option">10.00 pm</li>
                                                <li class="option">11.00 pm</li>
                                                <li class="option">12.00 pm</li>
                                                <li class="option">00.00 am</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="nice-select filter-input" tabindex="0"><span
                                                class="current">إلى</span>
                                            <ul class="list">
                                                <li class="option selected focus">7.00 am</li>
                                                <li class="option">8.00 am</li>
                                                <li class="option">9.00 am</li>
                                                <li class="option">10.00 am</li>
                                                <li class="option">11.00 am</li>
                                                <li class="option">12.00 am</li>
                                                <li class="option">1.00 pm</li>
                                                <li class="option">2.00 pm</li>
                                                <li class="option">3.00 pm</li>
                                                <li class="option">4.00 pm</li>
                                                <li class="option">5.00 pm</li>
                                                <li class="option">6.00 pm</li>
                                                <li class="option">7.00 pm</li>
                                                <li class="option">8.00 pm</li>
                                                <li class="option">9.00 pm</li>
                                                <li class="option">10.00 pm</li>
                                                <li class="option">11.00 pm</li>
                                                <li class="option">12.00 pm</li>
                                                <li class="option">00.00 am</li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="row mar-bot-30">
                                    <div class="col-md-2">
                                        <label class="fix_spacing">الجمعة</label>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="nice-select filter-input" tabindex="0"><span
                                                class="current">من</span>
                                            <ul class="list">
                                                <li class="option selected focus">7.00 am</li>
                                                <li class="option">8.00 am</li>
                                                <li class="option">9.00 am</li>
                                                <li class="option">10.00 am</li>
                                                <li class="option">11.00 am</li>
                                                <li class="option">12.00 am</li>
                                                <li class="option">1.00 pm</li>
                                                <li class="option">2.00 pm</li>
                                                <li class="option">3.00 pm</li>
                                                <li class="option">4.00 pm</li>
                                                <li class="option">5.00 pm</li>
                                                <li class="option">6.00 pm</li>
                                                <li class="option">7.00 pm</li>
                                                <li class="option">8.00 pm</li>
                                                <li class="option">9.00 pm</li>
                                                <li class="option">10.00 pm</li>
                                                <li class="option">11.00 pm</li>
                                                <li class="option">12.00 pm</li>
                                                <li class="option">00.00 am</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="nice-select filter-input" tabindex="0"><span
                                                class="current">إلى</span>
                                            <ul class="list">
                                                <li class="option selected focus">7.00 am</li>
                                                <li class="option">8.00 am</li>
                                                <li class="option">9.00 am</li>
                                                <li class="option">10.00 am</li>
                                                <li class="option">11.00 am</li>
                                                <li class="option">12.00 am</li>
                                                <li class="option">1.00 pm</li>
                                                <li class="option">2.00 pm</li>
                                                <li class="option">3.00 pm</li>
                                                <li class="option">4.00 pm</li>
                                                <li class="option">5.00 pm</li>
                                                <li class="option">6.00 pm</li>
                                                <li class="option">7.00 pm</li>
                                                <li class="option">8.00 pm</li>
                                                <li class="option">9.00 pm</li>
                                                <li class="option">10.00 pm</li>
                                                <li class="option">11.00 pm</li>
                                                <li class="option">12.00 pm</li>
                                                <li class="option">00.00 am</li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="row mar-bot-30">
                                    <div class="col-md-2">
                                        <label class="fix_spacing">السبت</label>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="nice-select filter-input" tabindex="0"><span
                                                class="current">من</span>
                                            <ul class="list">
                                                <li class="option selected focus">7.00 am</li>
                                                <li class="option">8.00 am</li>
                                                <li class="option">9.00 am</li>
                                                <li class="option">10.00 am</li>
                                                <li class="option">11.00 am</li>
                                                <li class="option">12.00 am</li>
                                                <li class="option">1.00 pm</li>
                                                <li class="option">2.00 pm</li>
                                                <li class="option">3.00 pm</li>
                                                <li class="option">4.00 pm</li>
                                                <li class="option">5.00 pm</li>
                                                <li class="option">6.00 pm</li>
                                                <li class="option">7.00 pm</li>
                                                <li class="option">8.00 pm</li>
                                                <li class="option">9.00 pm</li>
                                                <li class="option">10.00 pm</li>
                                                <li class="option">11.00 pm</li>
                                                <li class="option">12.00 pm</li>
                                                <li class="option">00.00 am</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="nice-select filter-input" tabindex="0"><span
                                                class="current">إلى</span>
                                            <ul class="list">
                                                <li class="option selected focus">7.00 am</li>
                                                <li class="option">8.00 am</li>
                                                <li class="option">9.00 am</li>
                                                <li class="option">10.00 am</li>
                                                <li class="option">11.00 am</li>
                                                <li class="option">12.00 am</li>
                                                <li class="option">1.00 pm</li>
                                                <li class="option">2.00 pm</li>
                                                <li class="option">3.00 pm</li>
                                                <li class="option">4.00 pm</li>
                                                <li class="option">5.00 pm</li>
                                                <li class="option">6.00 pm</li>
                                                <li class="option">7.00 pm</li>
                                                <li class="option">8.00 pm</li>
                                                <li class="option">9.00 pm</li>
                                                <li class="option">10.00 pm</li>
                                                <li class="option">11.00 pm</li>
                                                <li class="option">12.00 pm</li>
                                                <li class="option">00.00 am</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div> -->
                            <!-- <div class="tab-pane fade" id="social_network">
                                <h4><i class="icofont-ui-social-link"></i>حسابات مواقع التواصل الإجتماعي</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>الفيسبوك - اختياري</label>
                                            <input required type="text" class="form-control filter-input"
                                                placeholder="رابط الفيسبوك">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>الانستغرام - اختياري</label>
                                            <input required type="text" class="form-control filter-input"
                                                placeholder="رابط الانستغرام">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>تويتر - اختياري</label>
                                            <input required type="text" class="form-control filter-input"
                                                placeholder="رابط التويتر">
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <div class="res-box mar-top-10">
                                            <input required type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                            <label for="remember">أوافق على <a href="terms.html">الشروط
                                                    والأحكام</a></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-right sm-left">
                                        <button class="btn v8" type="submit">مراجعة</button>
                                        <button class="btn v8" type="submit">حفظ وتسجيل</button>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Add Listing ends-->
        <!-- Scroll to top starts-->
        <span class="scrolltotop"><i class="ion-arrow-up-c"></i></span>
        <!-- Scroll to top ends-->
    </div>
    <!--Page Wrapper ends-->



    @endsection
