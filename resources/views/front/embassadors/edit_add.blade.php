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
                                <li class="active"> <a href="{{route('index')}}">الرئيسية</a> </li>
                                <li> <h2 class="page-title ">  بيانات السفير</h2></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Breadcrumb section ends-->
        <!--Add embassadors starts-->
        <div class="list-details-section section-padding add_list pad-top-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content mar-tb-30 add_list_content">
                            <div class="tab-pane fade show active" id="general_info">
                                <h4> <i class="ion-ios-information"></i>السفراء:-</h4>
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
                                @if(isset($embassador))
                                <form class="row" action="{{route('embassador.update',$embassador->id)}}" method="post" enctype="multipart/form-data">
                                  @method('PUT')
                                  @else
                                  <form class="row" action="{{route('embassador.store')}}" method="POST" enctype="multipart/form-data">
                                    @endif
                                    @csrf
                                   <div class="col-md-6">
                                       <div class="form-group {{ $errors->has( 'first_name' ) ? 'has-error' : '' }}">
                                           <label> الاسم الاول</label>
                                           <input required type="text" class="form-control filter-input"placeholder="الإسم الاول"  name="first_name"  value="{{ old('first_name') ?? $embassador->first_name ?? null }}" >
                                           @if( $errors->has( 'first_name' ) )
                                                 <span class="help-block text-danger">
                                                     {{ $errors->first( 'first_name' ) }}
                                                 </span>
                                             @endif
                                       </div>
                                   </div>
                                   <div class="col-md-6">
                                       <div class="form-group {{ $errors->has( 'second_name' ) ? 'has-error' : '' }}">
                                           <label> الاسم الاخير</label>
                                           <input required type="text" class="form-control filter-input"placeholder="الإسم الاخير " name="second_name" value="{{ old('second_name') ?? $embassador->second_name ?? null }}"  >
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
                                           <input required type="email" class="form-control filter-input"placeholder="البريد الالكتروني " name="email"  value="{{ old('email') ?? $embassador->email ?? null }}">
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
                                                <input required disabled type="text" id="code" class="form-control filter-input"placeholder="+999" name="code" value"{{ old('code')}}">
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
                                           <input required dir='ltr' class="form-control filter-input text-left"placeholder="رقم الجوال" name="phone" value="{{ old('phone') ?? $embassador->phone ?? null }}"  >
                                           @if( $errors->has( 'phone' ) )
                                                 <span class="help-block text-danger">
                                                     {{ $errors->first( 'phone' ) }}
                                                 </span>
                                             @endif
                                       </div>
                                   </div>


                                   <div class="col-md-6">
                                       <div class="form-group {{ $errors->has( 'birth_date' ) ? 'has-error' : '' }}">
                                           <label> تاريخ الميلاد</label>
                                           <input required type="date" class="form-control filter-input"placeholder="  تاريخ الميلاد" name="birth_date" value="{{ old('birth_date') ?? $embassador->birth_date ?? null }}" >
                                           @if( $errors->has( 'birth_date' ) )
                                                   <span class="help-block text-danger">
                                                       {{ $errors->first( 'birth_date' ) }}
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

                                                    <option {{ (old('city', isset($embassador->city) ? $embassador->city:'' ) == $city->id) ? 'selected':''  }} value="{{$city->id}}">
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
                                    @if(!isset($embassador))
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
@endif
                                   <div class="col-md-4">
                                       <button type="submit"  class="btn v7"> حفظ  </button>
                                   </div>
                               </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Add embassadors ends-->


    <!--Page Wrapper ends-->

@endsection
