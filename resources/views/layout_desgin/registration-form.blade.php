@extends('master.headerandfooter')

@section('content')

    <!--Page Wrapper starts-->
    <div class="page-wrapper fixed-footer">
        <!--Breadcrumb section starts-->
        <div class="breadcrumb-section" style="background-image: url({{asset('images/breadcrumb/breadcrumb-1.jpg')}})">
            <div class="overlay op-5"></div>
            <div class="container">
                <div class="row align-items-center  pad-top-80">
                    <div class="col-md-6 col-12">
                        <div class="breadcrumb-menu text-left sm-left">
                            <ul>
                                <li class="active"><a href="{{route('home')}}">الرئيسية</a></li>
                                <li><a href="{{route('embssador.register')}}">تسجيل سفير</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="breadcrumb-menu">
                            <h2 class="page-title text-right">تسجيل سفير</h2>
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
                                <a data-toggle="tab" href="{{route('embssador.register')}}">بيانات السفير</a>
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
                                @if(session()->has('master_error'))
                                <div class="alert alert-danger text-center" role="alert">
                                  {{ session()->get('master_error') }}

                                </div>
                                @endif
                                @if(session()->has('success'))
                                <div class="alert alert-success text-center" role="alert">
                                {{ session()->get('success') }}
                                </div>
                                @endif
                                <form class="row" action="{{route('embssador.store')}}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                   <div class="col-md-6">
                                       <div class="form-group {{ $errors->has( 'first_name' ) ? 'has-error' : '' }}">
                                           <label> الاسم الاول</label>
                                           <input required type="text" class="form-control filter-input"placeholder="الإسم الاول"  name="first_name" value="{{ old('first_name')}}">
                                           @if( $errors->has( 'first_name' ) )
                                                 <span class="help-block text-danger">
                                                     {{ $errors->first( 'first_name' ) }}
                                                 </span>
                                             @endif
                                       </div>
                                   </div>
                                   <div class="col-md-6">
                                       <div class="form-group {{ $errors->has( 'secound_name' ) ? 'has-error' : '' }}">
                                           <label> الاسم الاخير</label>
                                           <input required type="text" class="form-control filter-input"placeholder="الإسم الاخير " name="secound_name" value="{{ old('secound_name')}}">
                                           @if( $errors->has( 'secound_name' ) )
                                                 <span class="help-block text-danger">
                                                     {{ $errors->first( 'secound_name' ) }}
                                                 </span>
                                             @endif
                                       </div>
                                   </div>
                                   <div class="col-md-6">
                                       <div class="form-group {{ $errors->has( 'email' ) ? 'has-error' : '' }}">
                                           <label>  البريد الالكتروني</label>
                                           <input required type="email" class="form-control filter-input"placeholder="البريد الالكتروني " name="email" value="{{ old('email')}}">
                                           @if( $errors->has( 'email' ) )
                                                 <span class="help-block text-danger">
                                                     {{ $errors->first( 'email' ) }}
                                                 </span>
                                             @endif
                                       </div>
                                   </div>
                                   <div class="col-md-6">
                                       <div  class="form-group {{ $errors->has( 'country' ) ? 'has-error' : '' }}">
                                           <label>الدوله</label>

                                           <select id="country" class="form-control filter-input" name="country" >
                                                 @if($countries)
                                                       <option value="{{$countries->id}}">{{$countries->name}}</option>
                                                       @endif
                                                   </select>
                                                   @if( $errors->has( 'country' ) )
                                                 <span class="help-block text-danger ">
                                                     {{ $errors->first( 'country' ) }}
                                                 </span>
                                             @endif
                                       </div>
                                   </div>
                                   {{--<div class="col-md-2 col-4">
                                       <div class="form-group {{ $errors->has( 'code' ) ? 'has-error' : '' }}">
                                           <label> كود الدولة </label>
                                           <input required disabled type="text" id="code" class="form-control filter-input"placeholder="+999" name="code" value"{{ old('code')}}">
                                           @if( $errors->has( 'code' ) )
                                                 <span class="help-block text-danger">
                                                     {{ $errors->first( 'code' ) }}
                                                 </span>
                                             @endif
                                       </div>
                                   </div>--}}
                                   <div class="col-md-6 ">
                                       <div class="form-group {{ $errors->has( 'phone_number' ) ? 'has-error' : '' }}">
                                           <label>  رقم الجوال</label>
                                           <input required  class="form-control filter-input"placeholder="رقم الجوال" name="phone_number" value="{{ old('phone_number')}}">
                                           @if( $errors->has( 'phone_number' ) )
                                                 <span class="help-block text-danger">
                                                     {{ $errors->first( 'phone_number' ) }}
                                                 </span>
                                             @endif
                                       </div>
                                   </div>
                                   <div class="col-md-6">
                                       <div class="form-group {{ $errors->has( 'city' ) ? 'has-error' : '' }}">
                                           <label> المدينه </label>
                                           <select class="form-control filter-input"  name="city" id="city">
                                             <option value="0">اختر المدينة</option>
                                             @foreach ($cities as $city)
                                                 <option value="{{$city->id}}">
                                                  {{$city->name}}
                                                 </option>
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
                                       <div class="form-group {{ $errors->has( 'password' ) ? 'has-error' : '' }}">
                                           <label>  كلمه السر </label>
                                           <input required type="password" class="form-control filter-input"placeholder="كلمه السر" value="{{ old('password')}}" name="password">
                                           @if( $errors->has( 'password' ) )
                                                 <span class="help-block text-danger">
                                                     {{ $errors->first( 'password' ) }}
                                                 </span>
                                             @endif
                                       </div>
                                   </div>
                                   <div class="col-md-6">
                                       <div class="form-group {{ $errors->has( 'confirm_password' ) ? 'has-error' : '' }}">
                                           <label> تاكيد كلمه السر </label>
                                           <input required type="password" class="form-control filter-input"placeholder="تاكيد كلمه السر  " name="confirm_password" value="{{ old('confirm_password')}}">
                                           @if( $errors->has( 'confirm_password' ) )
                                                 <span class="help-block text-danger">
                                                     {{ $errors->first( 'confirm_password' ) }}
                                                 </span>
                                             @endif
                                       </div>
                                   </div>

                                   <div class="col-md-12">
                                       <div class="form-group {{ $errors->has( 'birth_date' ) ? 'has-error' : '' }}">
                                           <label> تاريخ الميلاد</label>
                                           <input required type="date" class="form-control filter-input"placeholder="  تاريخ الميلاد" name="birth_date" value="{{ old('birth_date')}}">
                                           @if( $errors->has( 'birth_date' ) )
                                                 <span class="help-block text-danger">
                                                     {{ $errors->first( 'birth_date' ) }}
                                                 </span>
                                             @endif
                                       </div>
                                   </div>
                                   <div class="col-md-4">
                                       <button type="submit"  class="btn btn-save-embas">حفظ ومتابعة</button>
                                   </div>

                               </form>
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
