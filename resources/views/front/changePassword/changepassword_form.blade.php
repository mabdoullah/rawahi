@extends('front.master.app')
@section('content')
<!--changepassword starts-->
<div class="list-details-section section-padding add_list pad-top-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content mar-tb-30 add_list_content">
                  <form action="{{route('password.update')}}" method="post">
                    @csrf
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
                    <div class="tab-pane fade show active" id="general_info">
                        <h4> <i class="ion-ios-information"></i>تغير كلمة السر</h4>
                          <div class="row">
                            <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group {{$errors->has('old_password') ? 'has-error' : '' }}">
                                    <label> كلمة السر القديمة</label>
                                    <input  name="old_password" type="password"class="form-control filter-input"placeholder="كلمة السر القديمة"value="{{ old('old_password')}}">
                                        @if( $errors->has( 'old_password' ) )
                                        <span class="help-block text-danger">
                                            {{ $errors->first( 'old_password' ) }}
                                        </span>
                                        @endif
                                </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group {{$errors->has('new_password') ? 'has-error' : '' }}">
                                    <label> كلمة السر الجديدة</label>
                                    <input  name="new_password" type="password"
                                    class="form-control filter-input "
                                                placeholder="كلمة السر الجديدة" value="{{ old('new_password')}}">
                                        @if( $errors->has( 'new_password' ) )
                                        <span class="help-block text-danger">
                                            {{ $errors->first( 'new_password' ) }}
                                        </span>
                                        @endif
                                </div>
                            </div>
                           </div>
                           <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->has( 'confirm_password' ) ? 'has-error' : '' }}">
                                    <label> تاكيد كلمه السر </label>
                                    <input  type="password" class="form-control filter-input"placeholder="تاكيد كلمه السر  " name="confirm_password" value="{{ old('confirm_password')}}">
                                    @if( $errors->has( 'confirm_password' ) )
                                          <span class="help-block text-danger">
                                              {{ $errors->first( 'confirm_password' ) }}
                                          </span>
                                      @endif
                                </div>
                            </div>
                          </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn v7 mar-top-20">حفظ</button>
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
