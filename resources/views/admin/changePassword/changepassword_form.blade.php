@extends('admin.master.app')
@section('content')
<!--changepassword starts-->
<div class="list-details-section section-padding add_list pad-top-100">
    <div class="container">
        <div class="row">
          <!--begin::Portlet-->
          		<div class="kt-portlet">
          			<div class="kt-portlet__head">
          				<div class="kt-portlet__head-label">
          					<h3 class="kt-portlet__head-title">
                      <div class="alert alert-secondary" role="alert">
                        <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
                          <div class="alert-text">
تغير كلمة السر             							</div>
                      </div>
          					</h3>
          				</div>
          			</div>
          			<!--begin::Form-->
          			<form class="kt-form" action="{{route('admin.password.update')}}" method="post">
          				<div class="kt-portlet__body">
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
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group {{$errors->has('old_password') ? 'has-error' : '' }}">
                            <label for="old_password"> كلمة السر القديمة</label>
                            <input id='old_password' name="old_password" type="password"class="form-control filter-input"placeholder="كلمة السر القديمة"value="{{ old('old_password')}}">
                                @if( $errors->has( 'old_password' ) )
                                <span class="help-block text-danger">
                                    {{ $errors->first( 'old_password' ) }}
                                </span>
                                @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{$errors->has('new_password') ? 'has-error' : '' }}">
                            <label for="new_password"> كلمة السر الجديدة</label>
                            <input id='new_password' name="new_password" type="password"
                            class="form-control filter-input "
                                        placeholder="كلمة السر الجديدة" value="{{ old('new_password')}}">
                                @if( $errors->has( 'new_password' ) )
                                <span class="help-block text-danger">
                                    {{ $errors->first( 'new_password' ) }}
                                </span>
                                @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has( 'confirm_password' ) ? 'has-error' : '' }}">
                            <label for="confirm_password"> تاكيد كلمه السر </label>
                            <input id='confirm_password' type="password" class="form-control filter-input"placeholder="تاكيد كلمه السر  " name="confirm_password" value="{{ old('confirm_password')}}">
                            @if( $errors->has( 'confirm_password' ) )
                                  <span class="help-block text-danger">
                                      {{ $errors->first( 'confirm_password' ) }}
                                  </span>
                              @endif
                        </div>
                    </div>
                  </div>
          				</div>
          				<div class="kt-portlet__foot">
          					<div class="kt-form__actions">
          						<button type="submit" class="btn btn-primary">حفظ التغييرات</button>
          						<button type="reset" class="btn btn-secondary">إعادة تعين</button>
          					</div>
          				</div>
          			</form>
          			<!--end::Form-->
          		</div>
          		<!--end::Portlet-->
        </div>
    </div>
</div>
@endsection
