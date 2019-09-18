<!--Footer Starts-->
  <div class="footer-wrapper no-pad-tb ">
      <div class="footer-top-area section-padding" style="background-image: url({{asset('front/images/bg/pattern.png')}})">
          <div class="overlay op-9 green"></div>
          <div class="container">
              <div class="row nav-folderized">
                  <div class="col-lg-3 col-md-12">
                      <div class="footer-logo">
                          <a href="index.html"> <img src="{{asset('front/images/logo-white.png')}}" alt="logo"></a>
                          <div class="company-desc">
                              <p>
                                  رواهي منصتك الأولى لاستكشاف العالم من حولك
                              </p>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-12">
                      <div class="footer-content nav">
                          <h2 class="title">قائمة سريعة</h2>
                          <ul class="list">
                              <li><a class="link-hov style1" href="#">الدخول</a></li>
                              <li><a class="link-hov style1" href="#">حسابي</a></li>
                              <li><a class="link-hov style1" href="#">تسجيل شريك</a></li>
                              <li><a class="link-hov style1" href="#">اتفاقية الخصوصية</a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-12">
                      <div class="footer-content nav">
                          <h2 class="title">الفئات</h2>
                          <ul class="list">
                              <li><a class="link-hov style1" href="#">متاجر</a></li>
                              <li><a class="link-hov style1" href="#">مطاعم</a></li>
                              <li><a class="link-hov style1" href="#">مجمعات تجارية</a></li>
                              <li><a class="link-hov style1" href="#">مقدمي الخدمات</a></li>

                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-12">
                      <div class="footer-content nav">
                          <h2 class="title">تواصل معنا</h2>
                          <ul class="list footer-list">
                              <li>
                                  <div class="contact-info">
                                      <div class="icon">
                                          <i class="ion-ios-location"></i>
                                      </div>
                                      <div class="text">King Abdullah Road , Riyadh, KSA</div>
                                  </div>
                              </li>
                              <li>
                                  <div class="contact-info">
                                      <div class="icon">
                                          <i class="ion-email"></i>
                                      </div>
                                      <div class="text"><a href="#">info@rawahi.com</a></div>
                                  </div>
                              </li>
                              <li>
                                  <div class="contact-info">
                                      <div class="icon">
                                          <i class="ion-ios-telephone"></i>
                                      </div>
                                      <div class="text">+966 12345678</div>
                                  </div>
                              </li>
                          </ul>
                          <ul class="social-buttons style2">
                              <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                              <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                              <li><a href="#"><i class="ion-social-youtube"></i></a></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="footer-bottom-area">
          <div class="container">
              <div class="row">
                  <div class="col-md-12 text-center">
                      <p>&copy; 2019 Rawahi. All Rights Reserved.</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--Footer ends-->
  <!-- Scroll to top starts-->
  <span class="scrolltotop"><i class="ion-arrow-up-c"></i></span>
  <!-- Scroll to top ends-->
  <!--Scripts starts-->
  <!--plugin js-->
  <script src="{{ asset('front/js/plugin.js') }}"></script>
  <!--google maps-->
  <script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYFTtfLWhG7EDk8aoRiwpTek24HLJ38jQ&amp;libraries=places&amp;callback=initAutocomplete"></script>
  <!--Markercluster js-->
  <script src="{{ asset('front/js/markerclusterer.js') }}"></script>
  <!--Maps js-->
  <script src="{{ asset('front/js/maps.js') }}"></script>
  <!--Infobox js-->
  <script src="{{ asset('front/js/infobox.min.js') }}"></script>
  <!--Main js-->
  <script src="{{ asset('front/js/main.js') }}"></script>
  <!--Scripts ends-->
  @stack('jqueryCode')


  