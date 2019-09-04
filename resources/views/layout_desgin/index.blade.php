@extends('master.headerandfooter')

@section('content')


<!--Preloader starts-->
  <div class="preloader js-preloader">
      <div class="dots">
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
      </div>
  </div>
  <!--Preloader ends-->
        <!--Hero section starts-->
        <div class="video-area v1">
            <div class="video-container">
                <div class="overlay op-5"></div>
                <!-- <div id="video-wrapper" style="background-image: url(images/header/video-bg.jpg)"> </div> -->
                <!-- <a class="player" data-property="{videoURL:'https://youtu.be/6JBrppVIvi8'}"></a> -->
                <div class="container video-content">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1 class="hero-title v2">
                                رواهي
                            </h1>
                            <p class="hero-desc v2">
                                فريقك المفضل
                            </p>
                        </div>
                        <!-- <div class="col-md-12 text-center mar-top-20">
                            <form class="hero__form v2 mar-bot-30">
                                <div class="row">
                                    <div class="col-lg-4 col-md-12">
                                        <input class="hero__form-input custom-select" type="text" name="place-event" id="place-event" placeholder="مالذي تبحث عنه؟">
                                    </div>
                                    <div class="col-lg-3 col-md-12">
                                        <select class="hero__form-input  custom-select">
                                            <option>اختر الموقع </option>
                                            <option>الرياض</option>
                                            <option>جدة</option>
                                            <option>الدمام</option>
                                            <option>دبي</option>
                                            <option>القاهرة</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-12">
                                        <select class="hero__form-input  custom-select">
                                            <option>اختر الفئة</option>
                                            <option>متاجر</option>
                                            <option>مطاعم</option>
                                            <option>خدمات عامة</option>
                                            <option>فنادق</option>
                                            <option>شركات</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2 col-md-12">
                                        <div class="submit_btn text-right md-left">
                                            <button class="btn v3  mar-right-5" type="submit"><i class="ion-ios-search" aria-hidden="true"></i> إبحث</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!--Hero section ends-->
        <!--SearchBar Starts-->
        <div class="filter-wrapper style1 v2 trending-places">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pad-top-80 pad-bot-80">
                        <form class="hero__form v2 filter">
                            <div class="row">
                                <div class="col-lg-4 col-md-12">
                                    <input class="hero__form-input custom-select" type="text" name="place-event"
                                        id="place-event" placeholder="ماذا تريد؟">
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <select class="hero__form-input  custom-select">
                                        <option>اختر الموقع </option>
                                        <option>الرياض</option>
                                        <option>جدة</option>
                                        <option>الدمام</option>
                                        <option>دبي</option>
                                        <option>القاهرة</option>
                                    </select>

                                </div>
                                <div class="col-lg-3 col-md-12">

                                    <select class="hero__form-input  custom-select">
                                        <option>اختر الفئة</option>
                                        <option>المتاجر</option>
                                        <option>مطاعم</option>
                                        <option>خدمات عامة</option>
                                        <option>فنادق</option>
                                    </select>
                                </div>
                                <div class="col-lg-2 col-md-12">
                                    <div class="submit_btn text-left md-left">
                                        <button class="btn v3  mar-right-5" type="submit"><i class="ion-ios-search"
                                                aria-hidden="true"></i> إبحث</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--SearchBar Ends-->
        <!--fullwidth Map starts-->
        <div class="contact-map v2">
            <div class="container-fluid no-pad-lr">
                <div class="row">
                    <div class="col-md-12 no-padding">
                        <div id="map_right_listing"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--fullwidth Map ends-->
        <!--Category section starts-->
        <div class="popular-catagory  mar-top-30 pad-bot-50 section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-12">
                        <a href="#">
                            <div class="popular-catagory-content v2">
                                <div class="popular-catagory-img">
                                    <img src="images/category/cat_5.jpg" alt="..." class="img_fluid">
                                    <div class="overlay op-5"></div>
                                </div>
                                <div class="cat-content">
                                    <i class="icofont-travelling"></i>
                                    <h4 class="title">حول العالم</h4>
                                    <span>16 </span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <a href="#">
                            <div class="popular-catagory-content v2">
                                <div class="popular-catagory-img">
                                    <img src="images/category/cat_2.jpg" alt="..." class="img_fluid">
                                    <div class="overlay op-5"></div>
                                </div>
                                <div class="cat-content">
                                    <i class="icofont-cart-alt"></i>
                                    <h4 class="title">مجمعات تجارية</h4>
                                    <span>19 </span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <a href="#">
                            <div class="popular-catagory-content v2">
                                <div class="popular-catagory-img">
                                    <img src="images/category/cat_1.jpg" alt="..." class="img_fluid">
                                    <div class="overlay op-5"></div>
                                </div>
                                <div class="cat-content">
                                    <i class="icofont-restaurant"></i>
                                    <h4 class="title">مطاعم</h4>
                                    <span>12 </span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <a href="#">
                            <div class="popular-catagory-content v2">
                                <div class="popular-catagory-img">
                                    <img src="images/category/cat-1.jpg" alt="..." class="img_fluid">
                                    <div class="overlay op-5"></div>
                                </div>
                                <div class="cat-content">
                                    <i class="icofont-hotel"></i>
                                    <h4 class="title">فنادق</h4>
                                    <span> 27 </span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <a href="#">
                            <div class="popular-catagory-content v2">
                                <div class="popular-catagory-img">
                                    <img src="images/category/cat_3.jpg" alt="..." class="img_fluid">
                                    <div class="overlay op-5"></div>
                                </div>
                                <div class="cat-content">
                                    <i class="icofont-coffee-mug"></i>
                                    <h4 class="title">مقاهي</h4>
                                    <span>23 </span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12">
                        <a href="#">
                            <div class="popular-catagory-content v2">
                                <div class="popular-catagory-img">
                                    <img src="images/category/cat_4.jpg" alt="..." class="img_fluid">
                                    <div class="overlay op-5"></div>
                                </div>
                                <div class="cat-content">
                                    <i class="icofont-bank-alt"></i>
                                    <h4 class="title">متاجر </h4>
                                    <span>13 </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--Category section ends-->
        <!--Trending Place starts-->
        <div class="trending-places section-padding pad-bot-130">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="section-title v1">أضيف مؤخرا</h2>
                    </div>
                    <div class="col-md-12">
                        <div class="swiper-container trending-place-wrap">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide trending-place-item">
                                    <div class="trending-img">
                                        <img src="images/category/places/place-1.jpg" alt="#">
                                        <span class="trending-rating-green">7</span>
                                        <span class="save-btn"><i class="icofont-heart"></i></span>
                                    </div>
                                    <div class="trending-title-box">
                                        <h4><a href="#">فندق الفور سيزونز </a></h4>
                                        <div class="customer-review">
                                            <div class="rating-summary float-right">
                                                <div class="rating-result" title="60%">
                                                    <ul class="product-rating">
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star-half"></i></li>
                                                        <li><i class="ion-android-star-half"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="review-summury float-left">
                                                <p><a href="#"> 3 تقييمات </a></p>
                                            </div>
                                        </div>
                                        <ul class="trending-address">
                                            <li><i class="ion-ios-location"></i>
                                                <p>برج المملكة - العليا</p>
                                            </li>
                                            <li><i class="ion-ios-telephone"></i>
                                                <p>+966-600-2040</p>
                                            </li>
                                            <li><i class="ion-android-globe"></i>
                                                <p>web.rawahi.com</p>
                                            </li>
                                        </ul>
                                        <div class="trending-bottom mar-top-15 pad-bot-30">
                                            <div class="trend-left float-right">
                                                <span class="round-bg pink"><i class="icofont-hotel"></i></span>
                                                <p><a href="#">فندق</a></p>

                                            </div>
                                            <div class="trend-right float-left">
                                                <div class="trend-open"><i class="ion-clock"></i>
                                                    مفتوح <p>till 11.00pm</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide trending-place-item">
                                    <div class="trending-img">
                                        <img src="images/category/places/cafe.jpg" alt="#">
                                        <span class="trending-rating-orange">9</span>
                                        <span class="save-btn"><i class="icofont-heart"></i></span>
                                    </div>
                                    <div class="trending-title-box">
                                        <h4><a href="#">العنوان كافيه</a></h4>
                                        <div class="customer-review">
                                            <div class="rating-summary float-right">
                                                <div class="rating-result" title="60%">
                                                    <ul class="product-rating">
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star-half"></i></li>
                                                        <li><i class="ion-android-star-half"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="review-summury float-left">
                                                <p><a href="#">5 تقييمات</a></p>
                                            </div>
                                        </div>
                                        <ul class="trending-address">
                                            <li><i class="ion-ios-location"></i>
                                                <p>شارع الملك عبدالله</p>
                                            </li>
                                            <li><i class="ion-ios-telephone"></i>
                                                <p>+966-344-1198</p>
                                            </li>
                                            <li><i class="ion-android-globe"></i>
                                                <p>web.rawahi.com</p>
                                            </li>

                                        </ul>

                                        <div class="trending-bottom mar-top-15 pad-bot-30">
                                            <div class="trend-left float-right">
                                                <span class="round-bg green"><i class="icofont-tea"></i></span>
                                                <p><a href="#">مقهى</a></p>
                                            </div>

                                            <div class="trend-right float-left">
                                                <div class="trend-closed">
                                                    مغلق
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide trending-place-item">
                                    <div class="trending-img">
                                        <img src="images/category/places/place-5.jpg" alt="#">
                                        <span class="trending-rating-pink">6.5</span>
                                        <span class="save-btn"><i class="icofont-heart"></i></span>
                                    </div>
                                    <div class="trending-title-box">
                                        <h4><a href="#">الفيصلية مول</a></h4>
                                        <div class="customer-review">
                                            <div class="rating-summary float-right">
                                                <div class="rating-result" title="60%">
                                                    <ul class="product-rating">
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star-half"></i></li>
                                                        <li><i class="ion-android-star-half"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="review-summury float-left">
                                                <p><a href="#">3 تقييمات</a></p>
                                            </div>
                                        </div>
                                        <ul class="trending-address">
                                            <li><i class="ion-ios-location"></i>
                                                <p>شارع العليا الرياض</p>
                                            </li>
                                            <li><i class="ion-ios-telephone"></i>
                                                <p>+966 7336 8898</p>
                                            </li>
                                            <li><i class="ion-android-globe"></i>
                                                <p>web.rahawi.com</p>
                                            </li>

                                        </ul>

                                        <div class="trending-bottom mar-top-15 pad-bot-30">
                                            <div class="trend-left float-right">
                                                <span class="round-bg red"><i class="icofont-travelling"></i></span>
                                                <p><a href="#">سياحة</a></p>
                                            </div>
                                            <div class="trend-right float-left">
                                                <div class="trend-open"><i class="ion-clock"></i>
                                                    مفتوح <p>till 10.00pm</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide trending-place-item">
                                    <div class="trending-img">
                                        <img src="images/category/places/place-4.jpg" alt="#">
                                        <span class="trending-rating-green">8</span>
                                        <span class="save-btn"><i class="icofont-heart"></i></span>
                                    </div>
                                    <div class="trending-title-box">
                                        <h4><a href="#">أديداس</a></h4>
                                        <div class="customer-review">
                                            <div class="rating-summary float-right">
                                                <div class="rating-result" title="60%">
                                                    <ul class="product-rating">
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star-half"></i></li>
                                                        <li><i class="ion-android-star-half"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="review-summury float-left">
                                                <p><a href="#">3 تقييمات</a></p>
                                            </div>
                                        </div>
                                        <ul class="trending-address">
                                            <li><i class="ion-ios-location"></i>
                                                <p>الروضة الرياض</p>
                                            </li>
                                            <li><i class="ion-ios-telephone"></i>
                                                <p>+966 7336 8898</p>
                                            </li>
                                            <li><i class="ion-android-globe"></i>
                                                <p>web.rawahi.com</p>
                                            </li>

                                        </ul>

                                        <div class="trending-bottom mar-top-15 pad-bot-30">
                                            <div class="trend-left float-right">
                                                <span class="round-bg pink"><i class="ion-ios-cart"></i></span>
                                                <p><a href="#">متجر</a></p>

                                            </div>
                                            <div class="trend-right float-left">
                                                <div class="trend-open"><i class="ion-clock"></i>
                                                    مفتوح <p>till 10.00pm</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide trending-place-item">
                                    <div class="trending-img">
                                        <img src="images/category/places/place-9.jpg" alt="#">
                                        <span class="trending-rating-orange">6.5</span>
                                        <span class="save-btn"><i class="icofont-heart"></i></span>
                                    </div>
                                    <div class="trending-title-box">
                                        <h4><a href="#">مطعم الريف الايطالي</a></h4>
                                        <div class="customer-review">
                                            <div class="rating-summary float-right">
                                                <div class="rating-result" title="60%">
                                                    <ul class="product-rating">
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star-half"></i></li>
                                                        <li><i class="ion-android-star-half"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="review-summury float-left">
                                                <p><a href="#">3 تقييمات</a></p>
                                            </div>
                                        </div>
                                        <ul class="trending-address">
                                            <li><i class="ion-ios-location"></i>
                                                <p>الياسمين الرياض</p>
                                            </li>
                                            <li><i class="ion-ios-telephone"></i>
                                                <p>+966 7336 8898</p>
                                            </li>
                                            <li><i class="ion-android-globe"></i>
                                                <p>web.rawahi.com</p>
                                            </li>
                                        </ul>
                                        <div class="trending-bottom mar-top-15 pad-bot-30">
                                            <div class="trend-left float-right">
                                                <span class="round-bg green"><i class="icofont-fast-food"></i></span>
                                                <p><a href="#">مطعم</a></p>
                                            </div>
                                            <div class="trend-right float-left">
                                                <div class="trend-open"><i class="ion-clock"></i>
                                                    مفتوح <p>till 10.00pm</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide trending-place-item">
                                    <div class="trending-img">
                                        <img src="images/category/places/place-11.jpg" alt="#">
                                        <span class="trending-rating-green">8</span>
                                        <span class="save-btn"><i class="icofont-heart"></i></span>
                                    </div>
                                    <div class="trending-title-box">
                                        <h4><a href="#">متجر سيدتي</a></h4>
                                        <div class="customer-review">
                                            <div class="rating-summary float-right">
                                                <div class="rating-result" title="60%">
                                                    <ul class="product-rating">
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star-half"></i></li>
                                                        <li><i class="ion-android-star-half"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="review-summury float-left">
                                                <p><a href="#">3 تقييمات</a></p>
                                            </div>
                                        </div>
                                        <ul class="trending-address">
                                            <li><i class="ion-ios-location"></i>
                                                <p>العروبة الرياض</p>
                                            </li>
                                            <li><i class="ion-ios-telephone"></i>
                                                <p>+966 7336 8898</p>
                                            </li>
                                            <li><i class="ion-android-globe"></i>
                                                <p>web.rawahi.com</p>
                                            </li>
                                        </ul>
                                        <div class="trending-bottom mar-top-15 pad-bot-30">
                                            <div class="trend-left float-right">
                                                <span class="round-bg green"><i class="ion-ios-cart"></i></span>
                                                <p><a href="#">متجر</a></p>
                                            </div>
                                            <div class="trend-right float-left">
                                                <div class="trend-closed">
                                                    مغلق
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="trending-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--Trending Place ends-->

        <!--Popular City starts-->
        <div class="popular-catagory section-padding pad-bot-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="section-title v1">اكتشف العالم</h2>
                    </div>
                    <div class="col-md-4">
                        <div class="popular-item sm-grid mar-bot-30">
                            <div class="single-place">
                                <img class="single-place-image" src="images/category/ny.jpg" alt="place-image">
                                <div class="single-place-content">
                                    <h2 class="single-place-title">
                                        <a href="#">الرياض</a>
                                    </h2>
                                    <ul class="single-place-list v2">
                                        <li><span>234</span> شريك</li>
                                    </ul>
                                    <a class="btn v6 explore-place" href="#">اكتشف</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="popular-item sm-grid mar-bot-30">
                            <div class="single-place">
                                <img class="single-place-image" src="images/category/miami.jpg" alt="place-image">
                                <div class="single-place-content">
                                    <h2 class="single-place-title">
                                        <a href="#">جدة</a>
                                    </h2>
                                    <ul class="single-place-list v2">
                                        <li><span>150</span> شريك</li>
                                    </ul>
                                    <a class="btn v6 explore-place" href="#">اكتشف</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="popular-item sm-grid mar-bot-30">
                            <div class="single-place">
                                <img class="single-place-image" src="images/category/london.jpg" alt="place-image">
                                <div class="single-place-content">
                                    <h2 class="single-place-title">
                                        <a href="#">الدمام</a>
                                    </h2>
                                    <ul class="single-place-list v2">
                                        <li><span>135</span> شريك</li>
                                    </ul>
                                    <a class="btn v6 explore-place" href="#">اكتشف</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="popular-item sm-grid mar-bot-30">
                            <div class="single-place">
                                <img class="single-place-image" src="images/category/sp.jpg" alt="place-image">
                                <div class="single-place-content">
                                    <h2 class="single-place-title">
                                        <a href="#">دبي</a>
                                    </h2>
                                    <ul class="single-place-list v2">
                                        <li><span>90</span> شريك</li>
                                    </ul>
                                    <a class="btn v6 explore-place" href="#">اكتشف</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Popular Category ends-->



        <!--Coupon starts-->
        <div class="coupon-section mar-top-30 pad-bot-100">
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="section-title v1"> كوبونات خصم رواهي</h2>
                    </div>
                    <div class="col-md-12">
                        <div class="swiper-container coupon-wrap">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide coupon-content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="coupon-img">
                                                <img class="img-fluid" src="images/category/coupon/3.jpg" alt="...">
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <div class="coupon-desc">
                                                <h4>30% خصم</h4>
                                                <p>احصل على خصم رواهي المميز</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <div class="coupon-owner mar-top-20 text-right">
                                                <a href="store.html">مطعم فافولا</a>
                                                <a href="#" class="rating">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star-half"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="float-right">
                                                <a class="btn v1" data-toggle="modal" data-target="#coupon_wrap">
                                                    اخصل على الكوبون
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide coupon-content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="coupon-img">
                                                <img class="img-fluid" src="images/category/coupon/5.jpg" alt="...">
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <div class="coupon-desc float-right">
                                                <h4>20% خصم</h4>
                                                <p>احصل على خصم رواهي المميز</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-6 text-right">
                                            <div class="coupon-owner mar-top-20 text-right">
                                                <a href="store.html">نادي الرجل الصحي</a>
                                                <a href="#" class="rating">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star-half"></i>
                                                    <i class="ion-android-star-half"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="float-right">
                                                <a class="btn v1" data-toggle="modal" data-target="#coupon_wrap">
                                                    احصل على الكوبون
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="swiper-slide coupon-content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="coupon-img">
                                                <img class="img-fluid" src="images/category/coupon/4.jpg" alt="...">
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <div class="coupon-desc float-right">
                                                <h4>25% خصم</h4>
                                                <p>احصل على خصم رواهي المميز</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <div class="coupon-owner mar-top-20 text-right">
                                                <a href="store.html">فندق ايبيس</a>
                                                <a href="#" class="rating">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star-half"></i>
                                                    <i class="ion-android-star-half"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="float-right">
                                                <a class="btn v1" data-toggle="modal" data-target="#coupon_wrap">
                                                    احصل على الكوبون
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide coupon-content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="coupon-img">
                                                <img class="img-fluid" src="images/category/coupon/1.jpg" alt="...">
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <div class="coupon-desc float-right">
                                                <h4>50% خصم</h4>
                                                <p>احصل على خصم رواهي المميز</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <div class="coupon-owner mar-top-20 float-right">
                                                <a href="store.html">متجر الرجل</a>
                                                <a href="#" class="rating">
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star"></i>
                                                    <i class="ion-android-star-half"></i>
                                                    <i class="ion-android-star-half"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="float-right">
                                                <a class="btn v1" data-toggle="modal" data-target="#coupon_wrap">
                                                    احصل على الكوبون
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="slider-btn v1 coupon-next"><i class="ion-arrow-right-c"></i></div>
                        <div class="slider-btn v1 coupon-prev"><i class="ion-arrow-left-c"></i></div>
                        <div class="modal fade" id="coupon_wrap">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">احصل على كوبون رواهي</h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close"><span aria-hidden="true"><i
                                                    class="ion-ios-close-empty"></i></span></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="modal-coupon-code">
                                            <div class="store-content">
                                                <div class="text">
                                                    النوع :
                                                    <span> استرجاع نقدي</span>
                                                </div>
                                                <div class="store-content">القيمة : <span>25% استرجاع نقدي </span></div>
                                                <div class="store-content">صالح لغاية : <span>25-12-2019 </span></div>
                                                <div class="cashback-text">
                                                    <p>سيتم اضافة قيمة الاسترجاع النقدي بمحفظتك </p>
                                                </div>
                                            </div>
                                            <div class="coupon-code">
                                                <h5>
                                                    كود الكوبون: <span class="coupon-code-wrapper">
                                                        <i class="fa fa-scissors"></i>
                                                        12345
                                                    </span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="coupon-bottom">
                                        <div class="float-left"><a href="#" class="btn v1">تأكيد</a></div>
                                        <button type="button" class="btn v1 float-right" data-dismiss="modal">لا
                                            شكرا</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Coupon ends-->
        <!-- Scroll to top starts-->
        <span class="scrolltotop"><i class="ion-arrow-up-c"></i></span>
        <!-- Scroll to top ends-->
    </div>
    <!--Page Wrapper ends-->




    @endsection
