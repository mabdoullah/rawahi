@extends('front.master.app')

@section('content')

    <!--Page Wrapper starts-->

        <!--Breadcrumb section starts-->
        <div class="breadcrumb-section" >
            <div class="overlay op-5"></div>
            <div class="container">
                <div class="row align-items-center  pad-top-80">
                    <div class="col-12">
                        <div class="breadcrumb-menu text-center">
                            <ul>
                                <li class="active"> <a href="{{route('index')}}"> الرئيسية</a> </li>\
                                  <li> <a href="{{route('ambassadors.index')}}"> السفراء/</a></li>
                                @if(isset($ambassador))
                                <li> <h2 class="page-title ">  تعديل بيانات السفير</h2></li>
                                @else
                                <li> <h2 class="page-title "> تسجيل سفير جديد</h2></li>
                               @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Breadcrumb section ends-->
        <!--Add ambassadors starts-->
        <div class="list-details-section section-padding add_list pad-top-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content mar-tb-30 add_list_content">
                            <div class="tab-pane fade show active" id="general_info">
                                @if(isset($ambassador))
                                <h4> <i class="ion-ios-information"></i>تعديل بيانات السفير:-</h4>
                                @else
                                <h4> <i class="ion-ios-information"></i>تسجيل سفير جديد:-</h4>
                                @endif
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
                                @if(isset($ambassador))
                                <form class="row" action="{{route('ambassadors.update',$ambassador->id)}}" method="post" enctype="multipart/form-data">
                                  @method('PUT')
                                  @else
                                  <form class="row" action="{{route('ambassadors.store')}}" method="POST" enctype="multipart/form-data">
                                    @endif
                                    @csrf
                                    @if(isset($ambassador))

                                    <div class="col-md-1 offset-md-11">
                                        <div class="form-group">
                                            <label > رقم السفير</label>
                                            <div class="form-control filter-input disabled-id"><p>{{$ambassador->generate_id}}</p></div>
                                        </div>
                                    </div>

                                    @endif
                                   <div class="  col-md-6 ">
                                       <div class="form-group {{ $errors->has( 'first_name' ) ? 'has-error' : '' }}">
                                           <label> الاسم الاول</label>
                                           <input  type="text" class="form-control filter-input"placeholder="الإسم الاول"  name="first_name"  value="{{ old('first_name') ?? $ambassador->first_name ?? null }}" >
                                           @if( $errors->has( 'first_name' ) )
                                                 <span class="help-block text-danger">
                                                     {{ $errors->first( 'first_name' ) }}
                                                 </span>
                                             @endif
                                       </div>
                                   </div>
                                   <div class=" col-md-6">
                                       <div class="form-group {{ $errors->has( 'second_name' ) ? 'has-error' : '' }}">
                                           <label> الاسم الاخير</label>
                                           <input  type="text" class="form-control filter-input"placeholder="الإسم الاخير " name="second_name" value="{{ old('second_name') ?? $ambassador->second_name ?? null }}"  >
                                           @if( $errors->has( 'second_name' ) )
                                                 <span class="help-block text-danger">
                                                     {{ $errors->first( 'second_name' ) }}
                                                 </span>
                                             @endif
                                       </div>
                                   </div>
                                   <div class="col-md-6">
                                       <div class="form-group {{ $errors->has( 'email' ) ? 'has-error' : '' }}">
                                           <label>  البريد الالكتروني</label>
                                           <input  type="email" class="form-control filter-input"placeholder="البريد الالكتروني " name="email"  value="{{ old('email') ?? $ambassador->email ?? null }}">
                                           @if( $errors->has( 'email' ) )
                                                 <span class="help-block text-danger">
                                                     {{ $errors->first( 'email' ) }}
                                                 </span>
                                             @endif
                                       </div>
                                   </div>
                                   @if(1==2)
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
                                                <input  disabled type="text" id="code" class="form-control filter-input"placeholder="+999" name="code" value"{{ old('code')}}">
                                                @if( $errors->has( 'code' ) )
                                                    <span class="help-block text-danger">
                                                        {{ $errors->first( 'code' ) }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>--}}
                                   @endif
                                   <div class="col-md-6 ">
                                       <div class="form-group {{ $errors->has( 'phone' ) ? 'has-error' : '' }}">
                                           <label>  رقم الجوال</label>
                                           <input  dir='ltr' class="form-control filter-input text-left"placeholder="رقم الجوال" name="phone" value="{{ old('phone') ?? $ambassador->phone ?? null }}"  >
                                           @if( $errors->has( 'phone' ) )
                                                 <span class="help-block text-danger">
                                                     {{ $errors->first( 'phone' ) }}
                                                 </span>
                                             @endif
                                       </div>
                                   </div>


                                   <div class="col-md-6">
                                    <div id="datepicker" class="input-group date {{ $errors->has( 'birth_date' ) ? 'has-error' : '' }}" data-date-format="yyyy-mm-dd">
                                        <label> تاريخ الميلاد <span class="date-format">(يوم/شهر/سنه)</span> </label>

                                        <input id ='birth_date' name ='birth_date' class="form-control filter-input"
                                        placeholder="  تاريخ الميلاد" type="text" readonly  value="{{ old('birth_date') ?? $ambassador->birth_date ?? null }}"/>
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                    @if( $errors->has( 'birth_date' ) )
                                            <span class="help-block text-danger">
                                                {{ $errors->first( 'birth_date' ) }}
                                            </span>
                                    @endif
                                   </div>



                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has( 'city' ) ? 'has-error' : '' }}">
                                            <label> المدينه </label>
                                            <select class="form-control filter-input"  name="city" id="city">
                                                <option value="0">اختر المدينة</option>
                                                @foreach ($cities as $city)

                                                    <option {{ (old('city', isset($ambassador->city) ? $ambassador->city:'' ) == $city->id) ? 'selected':''  }} value="{{$city->id}}">
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
                                    @if(!isset($ambassador))
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has( 'password' ) ? 'has-error' : '' }}">
                                            <label>  كلمه السر </label>
                                            <input  type="password" class="form-control filter-input" placeholder="كلمه السر" value="{{ old('password')}}" name="password">
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
                                            <input type="password" class="form-control filter-input" placeholder="تاكيد كلمه السر  " name="confirm_password" value="{{ old('confirm_password')}}">
                                            @if( $errors->has( 'confirm_password' ) )
                                                  <span class="help-block text-danger">
                                                      {{ $errors->first( 'confirm_password' ) }}
                                                  </span>
                                              @endif
                                        </div>
                                    </div>
@endif
                                   <div class="col-md-4">
                                       @if(isset($ambassador))
                                       <button type="submit"  class="btn v7">حفظ التعديلات  </button>
                                       @else
                                       <button type="submit"  class="btn v7"> تسجيل سفير  </button>

                                       @endif
                                   </div>
                               </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Add ambassadors ends-->


    <!--Page Wrapper ends-->


@endsection

@push('jqueryCode')
<script>
$(function () {
  var date = new Date();
    $("#datepicker").datepicker({
          autoclose: true,
          todayHighlight: true,
    })
    @if(empty($ambassador->birth_date ))
    .datepicker('update', new Date((date.getFullYear() - 18 ),1,1))
    @endif
    ;
  });
  </script>
@endpush
