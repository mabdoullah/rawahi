@extends('admin.master.app')

@section('content')

<div class='row'>
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
</div>
<div class="row">
  <div class="col-lg-12">
    <!--begin::Portlet-->
    <div class="kt-portlet">
      <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
          <h3 class="kt-portlet__head-title">
            تعديل بيانات الادمن:-
          </h3>
        </div>
      </div>
      <!--begin::Form-->
      <form class="kt-form kt-form--label-right" action="{{ url('admin/settings/info/update') }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="kt-portlet__body">
          <div class="form-group row">
            <div class="col-lg-6 {{ $errors->has( 'name' ) ? 'has-error' : '' }}">
              <label> الاسم</label>
              <input required type="text" class="form-control " placeholder="الاسم" name="name" value={{ $admin->name }}>
              @if( $errors->has( 'name' ) )
              <span class="help-block text-danger">
                {{ $errors->first( 'name' ) }}
              </span>
              @endif
            </div>
          </div>

          
          <div class="form-group row">
            <div class="col-lg-6">
              <div class="form-group {{ $errors->has( 'phone' ) ? 'has-error' : '' }}">
                <label> رقم الجوال</label>
                <input required class="form-control text-left" placeholder="رقم الجوال" dir='ltr' name="phone" value={{ $admin->phone }}>
                @if( $errors->has( 'phone' ) )
                <span class="help-block text-danger">
                  {{ $errors->first( 'phone' ) }}
                </span>
                @endif
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-lg-6">
              <div class="form-group {{ $errors->has( 'email' ) ? 'has-error' : '' }}">
                <label> البريد الالكتروني</label>
                <input required type="email" class="form-control " placeholder="البريد الالكتروني " name="email" value={{ $admin->email }}>
                @if( $errors->has( 'email' ) )
                <span class="help-block text-danger">
                  {{ $errors->first( 'email' ) }}
                </span>
                @endif
              </div>
            </div>
          </div>
          
        <div class="kt-portlet__foot">
          <div class="kt-form__actions">
            <div class="row">
              <div class="col-lg-6">
                <button type="submit" class="btn btn-primary">تحديث الادمن</button>
                <button type="reset" class="btn btn-secondary">إعادة تعيين</button>
              </div>

            </div>
          </div>
        </div>

    </div>

    </form>
    <!--end::Form-->
  </div>
  <!--end::Portlet-->
</div>

@endsection

