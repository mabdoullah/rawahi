@extends('admin.master.app')

@section('content')
<!--Page Wrapper starts-->

<!-- begin:: Content -->
<div class='row'>
    @if(session()->has('master_error'))
    <div class="col-12">
        <div class="alert alert-danger text-center" style="display:inline-block; width: 100% " role="alert">
            <div class="alert-text">
            </div>
            {{ session()->get('master_error') }}
        </div>
    </div>
    @endif

    @if(session()->has('success'))
    <div class="col-12">
        <div class="alert alert-success text-center" style="display:inline-block; width: 100% " role="alert">
            <div class="alert-text"></div>

            {{ session()->get('success') }}
        </div>
    </div>
    @endif
</div>



<div class="col-lg-12">
    <!--begin::Portlet-->
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    تسجيل بيانات السفير:-
                </h3>
            </div>
        </div>
        <!--begin::Form-->
        <form class="kt-form kt-form--label-right" action="{{route('admin.ambassador.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="kt-portlet__body">
                <div class="form-group row">
                    <div class="col-lg-6 {{ $errors->has( 'name' ) ? 'has-error' : '' }}">
                        <label> الاسم الاول</label>
                        <input class="form-control " placeholder="الاسم الاول" name="first_name" value="{{ old('first_name')}}">
                        @if( $errors->has( 'first_name' ) )
                        <span class="help-block text-danger">
                            {{ $errors->first( 'first_name' ) }}
                        </span>
                        @endif
                    </div>
                    </div>
                    <div class="form-group row">
                    <div class="col-lg-6 {{ $errors->has( 'second_name' ) ? 'has-error' : '' }}">
                        <label> الاسم الاخير</label>
                        <input class="form-control " placeholder="الاسم الاخير" name="second_name" value="{{ old('second_name')}}">
                        @if( $errors->has( 'second_name' ) )
                        <span class="help-block text-danger">
                            {{ $errors->first( 'second_name' ) }}
                        </span>
                        @endif
                    </div>
                    </div>
                    <div class="form-group row">
                    <div class="col-lg-6">
                        <div class=" {{ $errors->has( 'email' ) ? 'has-error' : '' }}">
                            <label> البريد الالكتروني</label>
                            <input class="form-control " placeholder="البريد الالكتروني " name="email" value="{{ old('email')}}">
                            @if( $errors->has( 'email' ) )
                            <span class="help-block text-danger">
                                {{ $errors->first( 'email' ) }}
                            </span>
                            @endif
                        </div>
                    </div>
                    </div>

                <div class="form-group row">
                    <div class="col-lg-6">
                        <div class=" {{ $errors->has( 'agent' ) ? 'has-error' : '' }}">
                            <label> المدينه </label>
                            <select class="form-control " name="city" id="city">
                                <option value="0">اختر المدينة</option>
                                @foreach ($cities as $city)
                                <option @if( old('city')==$city->id) selected @endif value="{{$city->id}}">
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
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <div class="{{ $errors->has( 'city' ) ? 'has-error' : '' }}">
                            <label> الوكلاء </label>
                            <select class="form-control " name="agent_id" id="agentname">
                                @foreach ($agents as $agent)
                                <option value="{{$agent->id}}"> {{$agent->name}}
                                    @endforeach
                            </select>

                            @if( $errors->has( 'agent' ) )
                            <span class="help-block text-danger">
                                {{ $errors->first( 'agent_id' ) }}
                            </span>
                            @endif
                        </div>

                    </div>
                </div>

                    <div class="form-group row">
                        <div class="col-lg-6 {{ $errors->has( 'phone' ) ? 'has-error' : '' }}">
                            <label> رقم الجوال</label>
                            <input class="form-control " placeholder="رقم الجوال" name="phone" value="{{ old('phone')}}">
                            @if( $errors->has( 'phone' ) )
                            <span class="help-block text-danger">
                                {{ $errors->first( 'phone' ) }}
                            </span>
                            @endif
                        </div>
                    </div>

                <div class="form-group row">
                    <div class="col-lg-6">
                        <div class=" {{ $errors->has( 'password' ) ? 'has-error' : '' }}">
                            <label> كلمه السر </label>
                            <input type="password" class="form-control " placeholder="كلمه السر" value="{{ old('password')}}" name="password">
                            @if( $errors->has( 'password' ) )
                            <span class="help-block text-danger">
                                {{ $errors->first( 'password' ) }}
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                    <div class="form-group row">
                        <div class="col-lg-6 {{ $errors->has( 'confirm_password' ) ? 'has-error' : '' }}">
                            <label> تاكيد كلمه السر </label>
                            <input type="password" class="form-control " placeholder="تاكيد كلمه السر  " name="confirm_password" value="{{ old('confirm_password')}}">
                            @if( $errors->has( 'confirm_password' ) )
                            <span class="help-block text-danger">
                                {{ $errors->first( 'confirm_password' ) }}
                            </span>
                            @endif
                        </div>
                    </div>






                <div class="form-group row">
           <div class="col-lg-6 ">
           <div class=" {{ $errors->has( 'birth_date' ) ? 'has-error' : '' }} ">
            <label >ادخل تاريخ ميلادك</label>

              <div class=" date">
              <div class="input-group">
                <input type="text" class="form-control" readonly="" placeholder=" تاريخ الميلاد" id="kt_datepicker_2" name="birth_date" value="{{ old('birth_date')}}">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="la la-calendar-check-o"></i>
                  </span>
                </div>
                </div>
                @if( $errors->has( 'birth_date' ) )
                <span class="help-block text-danger">
                  {{ $errors->first( 'birth_date' ) }}
                </span>
                @endif


              </div>
            </div>
            </div>

       </div>









                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <div class="row">
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-primary">تسجيل سفير جديد</button>
                                <button type="reset" class="btn btn-secondary">إعادة تعيين</button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
        <!--end::Form-->
    </div>
</div>

<!--end::Portlet-->
</div>


@endsection
@push('jqueryCode')
<script>
$(function () {
  var date = new Date();
    $("#kt_datepicker_2").datepicker({
        format: 'yyyy-mm-dd',
          autoclose: true,
          todayHighlight: true,
    }).datepicker('update', new Date((date.getFullYear() - 18 ),1,1));
  });
  </script>
@endpush
