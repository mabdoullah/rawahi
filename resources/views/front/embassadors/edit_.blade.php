@extends('front.master.app')

@section('content')

    <!--Page Wrapper starts-->

        <!--Breadcrumb section starts-->
        <div class="breadcrumb-section" style="background-image: url({{asset('front/images/breadcrumb/breadcrumb-1.jpg')}})">
            <div class="overlay op-5"></div>
            <div class="container">
                <div class="row align-items-center  pad-top-80">
                    <div class="col-md-6 col-12">
                        <div class="breadcrumb-menu text-left sm-left">
                            <ul>
                                <li class="active"> <a href="{{route('index')}}">الرئيسية</a> </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="breadcrumb-menu">
                            <h2 class="page-title text-right">تعديل  بيانات السفير</h2>
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
                                @if($embassador)
                                <form class="row" action="{{route('embassador.update',$embassador->id)}}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  @method('PATCH')
                                   <div class="col-md-6">
                                       <div class="form-group {{ $errors->has( 'first_name' ) ? 'has-error' : '' }}">
                                           <label> الاسم الاول</label>
                                           <input required type="text" class="form-control filter-input"placeholder="الإسم الاول"  name="first_name" value="{{old('first_name', $embassador->first_name)}}">
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
                                           <input required type="text" class="form-control filter-input"placeholder="الإسم الاخير " name="second_name" value="{{old('second_name', $embassador->second_name)}}">
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
                                           <input required type="email" class="form-control filter-input"placeholder="البريد الالكتروني " name="email" value="{{old('email', $embassador->email)}}">
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
                                           <input required dir='ltr' class="form-control filter-input"placeholder="رقم الجوال" name="phone" value="{{old('phone', $embassador->phone)}}">
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
                                           <input required type="date" class="form-control filter-input"placeholder="  تاريخ الميلاد" name="birth_date" value="{{old('birth_date', $embassador->birth_date)}}">
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
                                                    <option @if( old('city',$embassador->city) == $city->id) selected @endif value="{{$city->id}}">
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
                                   <div class="col-md-4">
                                       <button type="submit"  class="btn v7"> حفظ التعديلات </button>
                                   </div>
                               </form>
                               @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Add Listing ends-->


    <!--Page Wrapper ends-->

@endsection
