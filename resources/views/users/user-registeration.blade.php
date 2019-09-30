  
 @extends('front.master.app')

 @section('content')
  <!--Breadcrumb section starts-->
  <div class="breadcrumb-section">
    <div class="overlay op-5"></div>
    <div class="container">
        <div class="row align-items-center  pad-top-80">
            <div class="col-12 text-center">
                <div class="breadcrumb-menu ">
                    <ul>
                        <li class="active"><a href="#"> الرئيسية </a></li>
                        <li>
                            <h2 class="page-title ">تسجيل المستخدم</h2>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
<!--Breadcrumb section ends-->
<!--user registration starts-->
<div class="list-details-section section-padding add_list pad-top-50">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="tab-content mar-tb-30 add_list_content">
                    <div class="tab-pane fade show active" id="general_info">
                        <h4> <i class="ion-ios-information"></i> بيانات المستخدم:</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> اسم المستخدم </label>
                                    <input required type="text"  name="username" class="form-control filter-input" placeholder="اسم المستخدم ">
                                </div>
                            </div>
                        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>  البريد الالكتروني</label>
                                    <input required type="email" name="email" class="form-control filter-input" placeholder="البريد الالكتروني ">
                                </div>
                            </div>

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
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="#" class="btn v7 mar-top-20">تسجيل </a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--user registration ends-->
@endsection