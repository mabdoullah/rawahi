@extends('front.master.app')

@section('content')


<!--login starts-->
<div class="list-details-section section-padding add_list pad-top-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content mar-tb-30 add_list_content">

                   


                  <form action="{{url('login')}}" method="post">
                    @csrf 

                    <div class="tab-pane fade show active" id="general_info">
                        <h4> <i class="ion-ios-information"></i> تسجيل الدخول</h4>
                        
                        @include('errors_msgs') 
                    
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{$errors->has('email') ? 'has-error' : '' }} ">
                                    <label>البريد الالكتروني</label>
                                    <input name="email" type="text" 
                                    class="form-control filter-input @if( $errors->has( 'email' ) ) is-invalid @endif" 
                                        placeholder="البريد الالكتروني" value="{{old('email')}}">
                                        @if( $errors->has( 'email' ) )
                                        <span class="help-block text-danger">
                                            {{ $errors->first( 'email' ) }}
                                        </span>
                                        @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{$errors->has('password') ? 'has-error' : '' }}">
                                    <label> كلمه السر</label>
                                    <input name="password" type="password" 
                                    class="form-control filter-input @if( $errors->has( 'password' ) ) is-invalid @endif"
                                                placeholder="كلمه السر">
                                        @if( $errors->has( 'password' ) )
                                        <span class="help-block text-danger">
                                            {{ $errors->first( 'password' ) }}
                                        </span>
                                        @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">                                                                  
                                <input type="checkbox" name="rememberme" value="1">
                                <label> تذكرني </label>                                    
                              </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <a href="forget-password.html"> نسيت كلمه السر ؟</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <a href="login.html">انشئ حساب جديد</a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn v7 mar-top-20"> تسجيل دخول </button>
                            </div>                                                      
                          </div>
                    
                    </div>

                  </form>
                    
                </div>
               
            </div>
        </div>
    </div>
</div>






@endsection





