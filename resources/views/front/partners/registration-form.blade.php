@extends('front.master.app')

@section('content')
  <!--Breadcrumb section starts-->
  <div class="breadcrumb-section" style="background-image: url(images/breadcrumb/breadcrumb-1.jpg)">
    <div class="overlay op-5"></div>
    <div class="container">
        <div class="row align-items-center  pad-top-80">

            <div class="col-md-6 col-12">
                <div class="breadcrumb-menu text-left sm-right">
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
<div class="list-details-section section-padding add_list pad-top-90" id="tabsContainer">
        <form  action="{{route('partner.store')}}" method="post" enctype="multipart/form-data">
            @csrf
    <div class="container">


        <div class="row">


            <div class="col-md-12">

                <ul class="nav nav-tabs list-details-tab">
                    <li class="nav-item {{ session('activeTab') == ''  ? "active" : "" }}">
                        <a data-toggle="tab" href="#general_info">بيانات الشريك</a>
                    </li>
                    <li class="nav-item {{ session('activeTab') == 'tab2'  ? "active" : "" }}">
                        <a data-toggle="tab" href="#gallery">الشعار</a>
                    </li>
                    <li class="nav-item {{ session('activeTab') == 'tab3'  ? "active" : "" }}">
                        <a data-toggle="tab" href="#location">الموقع وبيانات الاتصال<span
                                class="text-grey"></span></a>
                    </li>
                    <li class="nav-item {{ session('activeTab') == 'tab4'  ? "active" : "" }}">
                        <a data-toggle="tab" href="#open_time">ساعات العمل</a>
                    </li>

                    <li class="nav-item">
                        <a data-toggle="tab" href="#social_network">حسابات التواصل الاجتماعي <span
                                class="text-grey"></span></a>
                    </li>
                </ul>

<br>

                @if(session()->has('master_error'))
                <div class="alert alert-danger text-center" role="alert">
                  @if(isset($errors))
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li> {{ $error }}</li>
                     @endforeach
                    @endif
                  </ul>

                </div>
                 @endif
                @if(session()->has('success'))
                <div class="alert alert-success text-center" role="alert">
                {{ session()->get('success') }}
                </div>
              @endif


              <div class="tab-content mar-tb-30 add_list_content">

                    <div class="tab-pane fade {{ session('activeTab') == ''  ? "show active" : "" }}" id="general_info">

                        <h4> <i class="ion-ios-information"></i> بيانات الشريك:</h4>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>إسم الشريك</label>
                                    <input name="legal_name"  type="text" class="form-control filter-input"
                                        placeholder="الإسم التجاري للشريك" value="{{ old('legal_name')}}">
                                        @if( $errors->has( 'legal_name' ) )
                                               <span class="help-block text-danger">
                                                   {{ $errors->first( 'legal_name' ) }}
                                               </span>
                                           @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label>الفئة</label>
                                    <div  tabindex="0"><span
                                            class="current"></span>
                                        <select class="nice-select filter-input"  name="services" value="{{ old('services')}}">
                                            <option selected disabled > اختر الفئة</option>

                                            @foreach ($partnersTypesArray as $key => $value)
                                                 <option   value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>

                                        @if( $errors->has( 'services' ) )
                                               <span class="help-block text-danger">
                                                   {{ $errors->first( 'services' ) }}
                                               </span>
                                           @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>دلالات البحث</label>
                                    <input type="text" class="form-control filter-input"
                                        placeholder="أدخل كلمات البحث مفصولة بفاصلة">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>البريد الإلكتروني الرسمي</label>
                                    <input name="email"  type="text" class="form-control filter-input"
                                        placeholder="سيكون البريد الإلكتروني هو اسم المستخدم" value="{{ old('email')}}">
                                        @if( $errors->has( 'email' ) )
                                               <span class="help-block text-danger">
                                                   {{ $errors->first( 'email' ) }}
                                               </span>
                                           @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <!-- <form> -->
                                    <div class="form-group">
                                        <label for="list_info" >وصف الشريك</label>
                                        <textarea  class="form-control" id="list_info" rows="4"
                                            placeholder="أدخل وصف بسيط بخدمات الشريك"></textarea>
                                    </div>
                                <!-- </form> -->
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>نوع الاشتراك</label>
                                    <div   class="filter-checkbox">
                                        <input  type="checkbox"  id="check-a"  name="subscription_type"   value="1">

                                        <label for="check-a">1 year 3000 USD</label>
                                        <!-- <input required id="check-b" type="checkbox" name="check">
                                        <label for="check-b">2 years 5000 usd</label>
                                        <input required id="check-c" type="checkbox" name="check">
                                        <label for="check-c">trial 3 months</label> -->

                                        @if( $errors->has( 'subscription_type' ) )
                                               <span class="help-block text-danger">
                                                   {{ $errors->first( 'subscription_type' ) }}
                                               </span>
                                           @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>رقم السفير</label>
                                        <input name="embassador_id"  type="number" class="form-control filter-input"
                                            placeholder="رقم السفير " value="{{ old('embassador_id')}}">
                                            @if( $errors->has( 'embassador_id' ) )
                                                   <span class="help-block text-danger">
                                                       {{ $errors->first( 'embassador_id' ) }}
                                                   </span>
                                               @endif

                                    </div>

                                    <div class="col-md-6">
                                        <label>اسم السفير</label>
                                        <input  type="text" class="form-control filter-input"
                                            placeholder="this must be auto fill based on the ID">
                                    </div>
                                       {{-- <br> <br>
                                    <div class="col-md-6">
                                            <label>ادخل الرقم السر</label>
                                            <input  type="password" class="form-control filter-input"
                                                placeholder="ادخل الرقم السر">
                                        </div>
                                            <br> <br>
                                    <div class="col-md-6">
                                        <label> تاكيد كلمه السر</label>
                                                <input  type="password" class="form-control filter-input"
                                                    placeholder="تاكيد كلمه السر">
                                            </div> --}}
                                    <div class="col-md-4">
                                        <a href="javascript:;"  class="btn v7 mar-top-20 next">حفظ ومتابعة</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade {{ session('activeTab') == 'tab2'  ? "show active" : "" }}" id="gallery">
                        <h4><i class="ion-image"></i> الشعار :</h4>
                        <div class="form-group">
                            <div class="photo-upload">
                                <div class="form-group">
                                    <div class="add-listing__input-file-box">
                                        <input class="add-listing__input-file" type="file" name="image"
                                            id="file" value="{{ old('image')}}">
                                            @if( $errors->has( 'image' ) )
                                                   <span class="help-block text-danger">
                                                       {{ $errors->first( 'image' ) }}
                                                   </span>
                                               @endif

                                        <div class="add-listing__input-file-wrap">
                                            <i class="ion-ios-cloud-upload"></i>
                                            <p>إضغط هنا لرفع الشعار</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="add-btn">
                            <a href="javascript:;" class="btn v8 mar-top-20 previous">الخطوه السابقه</a>
                            <a href="javascript:;" class="btn v8 mar-top-20 next">حفظ ومتابعة</a>
                        </div>
                    </div>
                    <div class="tab-pane fade {{ session('activeTab') == 'tab3'  ? "show active" : "" }}" id="location">
                        <h4><i class="ion-ios-location"></i> الموقع وبيانات الاتصال:</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>اختر الدولة</label>
                                    <div  tabindex="0"><span
                                            class="current"> </span>
                                        <select class="nice-select filter-input" name="location" value="{{old('location')}}">
                                           <option  selected disabled>اختر الدولة</option>

                                            <option class="option">السعودية</option>
                                            <option disabled>الامارات</option>
                                            <option disabled>الكويت</option>
                                            <option disabled>مصر</li>

                                        </select>
                                        @if( $errors->has( 'image' ) )
                                               <span class="help-block text-danger">
                                                   {{ $errors->first( 'image' ) }}
                                               </span>
                                           @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div  class="form-group">
                                    <label>العنوان</label>
                                    <input id="address"  type="text" class="form-control filter-input"
                                        placeholder="ex. 250, Olayya Street...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>المدينة</label>
                                    <select class="nice-select filter-input" name="city" value="{{old('city')}}">
                                            <option  selected disabled>اختر المدينة </option>
                                                @foreach ($Cities as $City)
                                                <option class="option">{{$City->name}}</option>
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
                                <div class="form-group">
                                    <label>الرمز البريدي</label>
                                    <input  type="number" class="form-control filter-input"
                                        placeholder="ex. 5858">
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
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
                            </div> -->
                            <div class="col-md-12 no-padding">
                                <div id="map"></div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group mar-top-15">
                                    <label>الموقع الالكتروني </label>
                                    <input required type="text" class="form-control filter-input">
                                </div>
                            </div> -->
                            <div class="col-md-12">
                                <div class="form-group mar-top-15">
                                    <label>الجوال </label>
                                    <input name="phone"  type="text" class="form-control filter-input" value="{{old('phone')}}">
                                    @if( $errors->has( 'phone' ) )
                                           <span class="help-block text-danger">
                                               {{ $errors->first( 'phone' ) }}
                                           </span>
                                       @endif
                                </div>
                            </div>
                            <div class="add-btn">
                                    <a href="javascript:;" class="btn v8 mar-top-20 previous">الخطوه السابقه</a>
                                    <a href="javascript:;" class="btn v8 mar-top-20 next">حفظ ومتابعة</a>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade {{ session('activeTab') == 'tab4'  ? "show active" : "" }}" id="open_time">
                        <h4><i class="ion-clock"></i> ساعات العمل:</h4>
                        <div class="row mar-bot-30">
                            <div class="col-md-2">
                                <label class="fix_spacing">الأحد</label>
                            </div>
                            <div class="col-md-5">
                                <div  tabindex="0"><span
                                        class="current">من</span>
                                    <select class="nice-select filter-input"  >
                                        <option  selected focus">7.00 am</option>
                                        <option class="option">8.00 am</option>
                                        <option class="option">9.00 am</option>
                                        <option class="option">10.00 am</option>
                                        <option class="option">11.00 am</option>
                                        <option class="option">12.00 am</option>
                                        <option class="option">1.00 pm</option>
                                        <option class="option">2.00 pm</option>
                                        <option class="option">3.00 pm</option>
                                        <option class="option">4.00 pm</option>
                                        <option class="option">5.00 pm</option>
                                        <option class="option">6.00 pm</option>
                                        <option class="option">7.00 pm</option>
                                        <option class="option">8.00 pm</option>
                                        <option class="option">9.00 pm</option>
                                        <option class="option">10.00 pm</option>
                                        <option class="option">11.00 pm</option>
                                        <option class="option">12.00 pm</option>
                                        <option class="option">00.00 am</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div  tabindex="0"><span
                                        class="current">إلى</span>
                                        <select class="nice-select filter-input" >
                                             <option class="option selected focus">7.00 am</option>
                                             <option class="option">8.00 am</option>
                                              <option class="option">9.00 am</option>
                                               <option class="option">10.00 am</option>
                                                <option class="option">11.00 am</option>
                                                <option class="option">12.00 am</option>
                                                <option class="option">1.00 pm</option>
                                                <option class="option">2.00 pm</option>
                                                <option class="option">3.00 pm</option>
                                                <option class="option">4.00 pm</option>
                                                <option class="option">5.00 pm</option>
                                                <option class="option">6.00 pm</option>
                                                <option class="option">7.00 pm</option>
                                                <option class="option">8.00 pm</option>
                                                <option class="option">9.00 pm</option>
                                                <option class="option">10.00 pm</option>
                                                <option class="option">11.00 pm</option>
                                                <option class="option">12.00 pm</option>
                                                <option class="option">00.00 am</option>
                                         </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mar-bot-30">
                            <div class="col-md-2">
                                <label class="fix_spacing">الإثنين</label>
                            </div>
                            <div class="col-md-5">
                                <div tabindex="0"><span
                                        class="current">من</span>
                                        <select class="nice-select filter-input">
                                                <option class="option selected focus">7.00 am</option>
                                                <option class="option">8.00 am</option>
                                                 <option class="option">9.00 am</option>
                                                  <option class="option">10.00 am</option>
                                                   <option class="option">11.00 am</option>
                                                   <option class="option">12.00 am</option>
                                                   <option class="option">1.00 pm</option>
                                                   <option class="option">2.00 pm</option>
                                                   <option class="option">3.00 pm</option>
                                                   <option class="option">4.00 pm</option>
                                                   <option class="option">5.00 pm</option>
                                                   <option class="option">6.00 pm</option>
                                                   <option class="option">7.00 pm</option>
                                                   <option class="option">8.00 pm</option>
                                                   <option class="option">9.00 pm</option>
                                                   <option class="option">10.00 pm</option>
                                                   <option class="option">11.00 pm</option>
                                                   <option class="option">12.00 pm</option>
                                                   <option class="option">00.00 am</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div tabindex="0"><span
                                        class="current">إلى</span>
                                        <select class="nice-select filter-input">
                                                <option class="option selected focus">7.00 am</option>
                                                <option class="option">8.00 am</option>
                                                 <option class="option">9.00 am</option>
                                                  <option class="option">10.00 am</option>
                                                   <option class="option">11.00 am</option>
                                                   <option class="option">12.00 am</option>
                                                   <option class="option">1.00 pm</option>
                                                   <option class="option">2.00 pm</option>
                                                   <option class="option">3.00 pm</option>
                                                   <option class="option">4.00 pm</option>
                                                   <option class="option">5.00 pm</option>
                                                   <option class="option">6.00 pm</option>
                                                   <option class="option">7.00 pm</option>
                                                   <option class="option">8.00 pm</option>
                                                   <option class="option">9.00 pm</option>
                                                   <option class="option">10.00 pm</option>
                                                   <option class="option">11.00 pm</option>
                                                   <option class="option">12.00 pm</option>
                                                   <option class="option">00.00 am</option>
                                        </select>
                                </div>
                            </div>

                        </div>
                        <div class="row mar-bot-30">
                            <div class="col-md-2">
                                <label class="fix_spacing">الثلاثاء</label>
                            </div>
                            <div class="col-md-5">
                                <div  tabindex="0"><span
                                        class="current">من</span>
                                        <select class="nice-select filter-input">
                                                <option class="option selected focus">7.00 am</option>
                                                <option class="option">8.00 am</option>
                                                 <option class="option">9.00 am</option>
                                                  <option class="option">10.00 am</option>
                                                   <option class="option">11.00 am</option>
                                                   <option class="option">12.00 am</option>
                                                   <option class="option">1.00 pm</option>
                                                   <option class="option">2.00 pm</option>
                                                   <option class="option">3.00 pm</option>
                                                   <option class="option">4.00 pm</option>
                                                   <option class="option">5.00 pm</option>
                                                   <option class="option">6.00 pm</option>
                                                   <option class="option">7.00 pm</option>
                                                   <option class="option">8.00 pm</option>
                                                   <option class="option">9.00 pm</option>
                                                   <option class="option">10.00 pm</option>
                                                   <option class="option">11.00 pm</option>
                                                   <option class="option">12.00 pm</option>
                                                   <option class="option">00.00 am</option>
                                         </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div  tabindex="0"><span
                                        class="current">إلى</span>
                                        <select class="nice-select filter-input">
                                                <option class="option selected focus">7.00 am</option>
                                                <option class="option">8.00 am</option>
                                                 <option class="option">9.00 am</option>
                                                  <option class="option">10.00 am</option>
                                                   <option class="option">11.00 am</option>
                                                   <option class="option">12.00 am</option>
                                                   <option class="option">1.00 pm</option>
                                                   <option class="option">2.00 pm</option>
                                                   <option class="option">3.00 pm</option>
                                                   <option class="option">4.00 pm</option>
                                                   <option class="option">5.00 pm</option>
                                                   <option class="option">6.00 pm</option>
                                                   <option class="option">7.00 pm</option>
                                                   <option class="option">8.00 pm</option>
                                                   <option class="option">9.00 pm</option>
                                                   <option class="option">10.00 pm</option>
                                                   <option class="option">11.00 pm</option>
                                                   <option class="option">12.00 pm</option>
                                                   <option class="option">00.00 am</option>
                                            </select>
                                </div>
                            </div>

                        </div>
                        <div class="row mar-bot-30">
                            <div class="col-md-2">
                                <label class="fix_spacing">الأربعاء</label>
                            </div>
                            <div class="col-md-5">
                                <div tabindex="0"><span
                                        class="current">من</span>
                                        <select class="nice-select filter-input">
                                                <option class="option selected focus">7.00 am</option>
                                                 <option class="option">8.00 am</option>
                                                 <option class="option">9.00 am</option>
                                                  <option class="option">10.00 am</option>
                                                   <option class="option">11.00 am</option>
                                                   <option class="option">12.00 am</option>
                                                   <option class="option">1.00 pm</option>
                                                   <option class="option">2.00 pm</option>
                                                   <option class="option">3.00 pm</option>
                                                   <option class="option">4.00 pm</option>
                                                   <option class="option">5.00 pm</option>
                                                   <option class="option">6.00 pm</option>
                                                   <option class="option">7.00 pm</option>
                                                   <option class="option">8.00 pm</option>
                                                   <option class="option">9.00 pm</option>
                                                   <option class="option">10.00 pm</option>
                                                   <option class="option">11.00 pm</option>
                                                   <option class="option">12.00 pm</option>
                                                   <option class="option">00.00 am</option>
                                            </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div  tabindex="0"><span
                                        class="current">إلى</span>
                                        <select class="nice-select filter-input">
                                                <option class="option selected focus">7.00 am</option>
                                                <option class="option">8.00 am</option>
                                                 <option class="option">9.00 am</option>
                                                  <option class="option">10.00 am</option>
                                                   <option class="option">11.00 am</option>
                                                   <option class="option">12.00 am</option>
                                                   <option class="option">1.00 pm</option>
                                                   <option class="option">2.00 pm</option>
                                                   <option class="option">3.00 pm</option>
                                                   <option class="option">4.00 pm</option>
                                                   <option class="option">5.00 pm</option>
                                                   <option class="option">6.00 pm</option>
                                                   <option class="option">7.00 pm</option>
                                                   <option class="option">8.00 pm</option>
                                                   <option class="option">9.00 pm</option>
                                                   <option class="option">10.00 pm</option>
                                                   <option class="option">11.00 pm</option>
                                                   <option class="option">12.00 pm</option>
                                                   <option class="option">00.00 am</option>
                                            </select>
                                </div>
                            </div>

                        </div>
                        <div class="row mar-bot-30">
                            <div class="col-md-2">
                                <label class="fix_spacing">الخميس</label>
                            </div>
                            <div class="col-md-5">
                                <div  tabindex="0"><span
                                        class="current">من</span>
                                        <select class="nice-select filter-input">
                                                <option class="option selected focus">7.00 am</option>
                                                <option class="option">8.00 am</option>
                                                 <option class="option">9.00 am</option>
                                                  <option class="option">10.00 am</option>
                                                   <option class="option">11.00 am</option>
                                                   <option class="option">12.00 am</option>
                                                   <option class="option">1.00 pm</option>
                                                   <option class="option">2.00 pm</option>
                                                   <option class="option">3.00 pm</option>
                                                   <option class="option">4.00 pm</option>
                                                   <option class="option">5.00 pm</option>
                                                   <option class="option">6.00 pm</option>
                                                   <option class="option">7.00 pm</option>
                                                   <option class="option">8.00 pm</option>
                                                   <option class="option">9.00 pm</option>
                                                   <option class="option">10.00 pm</option>
                                                   <option class="option">11.00 pm</option>
                                                   <option class="option">12.00 pm</option>
                                                   <option class="option">00.00 am</option>
                                            </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div  tabindex="0"><span
                                        class="current">إلى</span>
                                        <select class="nice-select filter-input">
                                                <option class="option selected focus">7.00 am</option>
                                                <option class="option">8.00 am</option>
                                                 <option class="option">9.00 am</option>
                                                  <option class="option">10.00 am</option>
                                                   <option class="option">11.00 am</option>
                                                   <option class="option">12.00 am</option>
                                                   <option class="option">1.00 pm</option>
                                                   <option class="option">2.00 pm</option>
                                                   <option class="option">3.00 pm</option>
                                                   <option class="option">4.00 pm</option>
                                                   <option class="option">5.00 pm</option>
                                                   <option class="option">6.00 pm</option>
                                                   <option class="option">7.00 pm</option>
                                                   <option class="option">8.00 pm</option>
                                                   <option class="option">9.00 pm</option>
                                                   <option class="option">10.00 pm</option>
                                                   <option class="option">11.00 pm</option>
                                                   <option class="option">12.00 pm</option>
                                                   <option class="option">00.00 am</option>
                                            </select>
                                </div>
                            </div>

                        </div>
                        <div class="row mar-bot-30">
                            <div class="col-md-2">
                                <label class="fix_spacing">الجمعة</label>
                            </div>
                            <div class="col-md-5">
                                <div  tabindex="0"><span
                                        class="current">من</span>
                                        <select class="nice-select filter-input">
                                                <option class="option selected focus">7.00 am</option>
                                                <option class="option">8.00 am</option>
                                                 <option class="option">9.00 am</option>
                                                  <option class="option">10.00 am</option>
                                                   <option class="option">11.00 am</option>
                                                   <option class="option">12.00 am</option>
                                                   <option class="option">1.00 pm</option>
                                                   <option class="option">2.00 pm</option>
                                                   <option class="option">3.00 pm</option>
                                                   <option class="option">4.00 pm</option>
                                                   <option class="option">5.00 pm</option>
                                                   <option class="option">6.00 pm</option>
                                                   <option class="option">7.00 pm</option>
                                                   <option class="option">8.00 pm</option>
                                                   <option class="option">9.00 pm</option>
                                                   <option class="option">10.00 pm</option>
                                                   <option class="option">11.00 pm</option>
                                                   <option class="option">12.00 pm</option>
                                                   <option class="option">00.00 am</option>
                                            </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div  tabindex="0"><span
                                        class="current">إلى</span>
                                        <select class="nice-select filter-input">
                                                <option class="option selected focus">7.00 am</option>
                                                <option class="option">8.00 am</option>
                                                 <option class="option">9.00 am</option>
                                                  <option class="option">10.00 am</option>
                                                   <option class="option">11.00 am</option>
                                                   <option class="option">12.00 am</option>
                                                   <option class="option">1.00 pm</option>
                                                   <option class="option">2.00 pm</option>
                                                   <option class="option">3.00 pm</option>
                                                   <option class="option">4.00 pm</option>
                                                   <option class="option">5.00 pm</option>
                                                   <option class="option">6.00 pm</option>
                                                   <option class="option">7.00 pm</option>
                                                   <option class="option">8.00 pm</option>
                                                   <option class="option">9.00 pm</option>
                                                   <option class="option">10.00 pm</option>
                                                   <option class="option">11.00 pm</option>
                                                   <option class="option">12.00 pm</option>
                                                   <option class="option">00.00 am</option>
                                            </select>
                                </div>
                            </div>

                        </div>
                        <div class="row mar-bot-30">
                            <div class="col-md-2">
                                <label class="fix_spacing">السبت</label>
                            </div>
                            <div class="col-md-5">
                                <div tabindex="0"><span
                                        class="current">من</span>
                                        <select class="nice-select filter-input">
                                                <option class="option selected focus">7.00 am</option>
                                                <option class="option">8.00 am</option>
                                                 <option class="option">9.00 am</option>
                                                  <option class="option">10.00 am</option>
                                                   <option class="option">11.00 am</option>
                                                   <option class="option">12.00 am</option>
                                                   <option class="option">1.00 pm</option>
                                                   <option class="option">2.00 pm</option>
                                                   <option class="option">3.00 pm</option>
                                                   <option class="option">4.00 pm</option>
                                                   <option class="option">5.00 pm</option>
                                                   <option class="option">6.00 pm</option>
                                                   <option class="option">7.00 pm</option>
                                                   <option class="option">8.00 pm</option>
                                                   <option class="option">9.00 pm</option>
                                                   <option class="option">10.00 pm</option>
                                                   <option class="option">11.00 pm</option>
                                                   <option class="option">12.00 pm</option>
                                                   <option class="option">00.00 am</option>
                                            </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div tabindex="0"><span
                                        class="current">إلى</span>
                                        <select class="nice-select filter-input">
                                                <option class="option selected focus">7.00 am</option>
                                                <option class="option">8.00 am</option>
                                                 <option class="option">9.00 am</option>
                                                  <option class="option">10.00 am</option>
                                                   <option class="option">11.00 am</option>
                                                   <option class="option">12.00 am</option>
                                                   <option class="option">1.00 pm</option>
                                                   <option class="option">2.00 pm</option>
                                                   <option class="option">3.00 pm</option>
                                                   <option class="option">4.00 pm</option>
                                                   <option class="option">5.00 pm</option>
                                                   <option class="option">6.00 pm</option>
                                                   <option class="option">7.00 pm</option>
                                                   <option class="option">8.00 pm</option>
                                                   <option class="option">9.00 pm</option>
                                                   <option class="option">10.00 pm</option>
                                                   <option class="option">11.00 pm</option>
                                                   <option class="option">12.00 pm</option>
                                                   <option class="option">00.00 am</option>
                                            </select>
                                </div>
                            </div>
                            <div class="add-btn">
                                    <a href="javascript:;" class="btn v8 mar-top-20 previous">الخطوه السابقه</a>
                                    <a href="javascript:;" class="btn v8 mar-top-20 next">حفظ ومتابعة</a>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade {{ session('activeTab') == 'tab5'  ? "show active" : "" }}" id="social_network">
                        <h4><i class="icofont-ui-social-link"></i>حسابات مواقع التواصل الإجتماعي</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>الفيسبوك - اختياري</label>
                                    <input  type="text" class="form-control filter-input"
                                        placeholder="رابط الفيسبوك">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>الانستغرام - اختياري</label>
                                    <input  type="text" class="form-control filter-input"
                                        placeholder="رابط الانستغرام">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>تويتر - اختياري</label>
                                    <input  type="text" class="form-control filter-input"
                                        placeholder="رابط التويتر">
                                </div>
                            </div>
                            <div class="col-md-6 text-left">
                                <div class="res-box mar-top-10">
                                    <input  type="checkbox" tabindex="3" class="" name="remember"
                                        id="remember">
                                    <label for="remember">أوافق على <a href="terms.html">الشروط
                                            والأحكام</a></label>
                                </div>
                            </div>
                            <div class="col-md-6 text-right sm-left">

                                <a href="javascript:;" class="btn v8 previous">الخطوه السابقه</a>

                                {{-- <button class="btn v8" type="submit">مراجعة</button> --}}
                                <button type="submit" class="btn v8" >حفظ وتسجيل</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
</div>
<!--Add Listing ends-->
</div>
<!--Page Wrapper ends-->





<!--Scripts ends-->


    @endsection



    @push('jqueryCode')

    <script>
        $('.next').click(function () {
          $('html, body').animate({
                  scrollTop: $('#tabsContainer').offset().top
              }, 800);

              $('.nav-tabs > .nav-item.active').next('li').find('a').trigger('click');
              return false;

          });

        $('.previous').click(function(){
            $('html, body').animate({
                scrollTop: $('#tabsContainer').offset().top
            }, 800);
            $('.nav-tabs > .nav-item.active').prev('li').find('a').trigger('click');
            return false;
        });
      </script>

    @endpush
