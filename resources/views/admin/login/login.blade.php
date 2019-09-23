<!DOCTYPE html>
<html lang="en" >
    <!-- begin::Head -->
    <head><!--begin::Base Path (base relative path for assets of this page) -->
        <meta charset="utf-8"/>
        <title>login</title>
        <meta name="description" content="admin login">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--begin::Fonts -->
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700|Cairo:300,400:500,600,700">
        <!--end::Fonts -->
        <!--begin::Page Custom Styles(used by this page) -->
          <link href="{{asset('admin_design/css/pages/login/login-4.rtl.css')}}" rel="stylesheet" type="text/css" />
        <!--end::Page Custom Styles -->
        <!--begin::Global Theme Styles(used by all pages) -->
          <link href="{{asset('admin_design/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles -->
		<!--begin::Custom Theme Styles -->
		<link href="{{asset('admincustom.css')}}" rel="stylesheet" type="text/css" />
        <!--end::Custom Theme Styles -->
    </head>
    <!-- end::Head -->
    <!-- begin::Body -->
    <body  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading"  >
    	<!-- begin:: Page -->
      	<div class="kt-grid kt-grid--ver kt-grid--root">
      		<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v4 kt-login--signin" id="kt_login">
      	<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url({{asset('admin_design/media/bg/bg-2.jpg')}});">
      		<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
      			<div class="kt-login__container">
      				<div class="kt-login__logo">
      					<a href="#">
      						<!-- <img src="{{asset('admin_design/media/logos/logo-5.png')}}"> -->
                  <img src="{{asset('front/images/logo-admin.png')}}" alt="logo"
                          class="img-fluid" width="200px">
      					</a>
      				</div>
      				<div class="kt-login__signin">
      					<div class="kt-login__head">
      						<h3 class="kt-login__title">تسجيل الدخول</h3>
      					</div>
						<form class="kt-form" action="{{url('admin/login')}}" method="post">
								@csrf
      						<div class="input-group">
								  
								<input dir="rtl" class="form-control is-invalid" type="text" placeholder="البريد الإلكتروني" name="email" autocomplete="off"
								  value="{{old('email')}}" aria-describedby="email-error">
								  @if( $errors->has( 'email' ) )
									<div id="email-error" class="error invalid-feedback">{{ $errors->first( 'email' ) }}</div>
								  @endif
      						</div>
      						<div class="input-group">
								  <input dir="rtl" class="form-control is-invalid" type="password" placeholder="كلمة السر" name="password">
								  @if( $errors->has( 'password' ) )
								  <div id="password-error" class="error invalid-feedback">{{ $errors->first( 'password' ) }}</div>
								  @endif
      						</div>
      						<div class="row kt-login__extra">
      							<div class="col">
      								<label class="kt-checkbox">
      									<input type="checkbox" name="rememberme" value="1"> تذكرني
      									<span></span>
      								</label>
      							</div>
      							{{-- <div class="col kt-align-right">
      								<a href="javascript:;" id="kt_login_forgot" class="kt-login__link">نسيت كلمة السر؟</a>
      							</div> --}}
      						</div>
      						<div class="kt-login__actions">
      							<button id="kt_login_signin_submit" class="btn btn-brand btn-pill kt-login__btn-primary">تسجيل الدخول</button>
      						</div>
      					</form>
      				</div>
      				{{-- <div class="kt-login__account">
      					<span class="kt-login__account-msg">
      						لا تملك حسابا حتى الآن ؟
      					</span>
      					&nbsp;&nbsp;
      					<a href="javascript:;" id="kt_login_signup" class="kt-login__account-link">انشئ حساب جديد</a>
      				</div> --}}
      			</div>
      		</div>
      	</div>
      </div>
      	</div>

<!-- end:: Page -->

  <!-- begin::Global Config(global config for global JS sciprts) -->
  <script>
      var KTAppOptions = {"colors":{"state":{"brand":"#5d78ff","dark":"#282a3c","light":"#ffffff","primary":"#5867dd","success":"#34bfa3","info":"#36a3f7","warning":"#ffb822","danger":"#fd3995"},"base":{"label":["#c5cbe3","#a1a8c3","#3d4465","#3e4466"],"shape":["#f0f3ff","#d9dffa","#afb4d4","#646c9a"]}}};
  </script>
 <!-- end::Global Config -->
<!--begin::Global Theme Bundle(used by all pages) -->
<script src="{{asset('admin_design/js/scripts.bundle.js')}}" type="text/javascript"></script>
<!--end::Global Theme Bundle -->
<!--begin::Page Scripts(used by this page) -->
<script src="{{asset('admin_design/js/pages/login/login-general.js')}}" type="text/javascript"></script>
<!--end::Page Scripts -->
</body>
  <!-- end::Body -->
</html>
