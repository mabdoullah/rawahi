@extends('admin.master.app')
@section('content')



<div class='row'>
  @if(session()->has('master_error'))
  <div class="col-12">
    <div class="alert alert-success text-center" style="display:inline-block; width: 100% " role="alert">
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

<div class="kt-portlet kt-portlet--mobile">
  <div class="kt-portlet__head kt-portlet__head--lg">
    <div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon">
        <i class="kt-font-brand flaticon2-line-chart"></i>
      </span>
      <h3 class="kt-portlet__head-title">
        بيانات السفراء </h3>
     
        <form class="kt-margin-l-20" id="kt_subheader_search_form" action="{{route('admin.embassador.index') }}">
        <div class="kt-input-icon kt-input-icon--right kt-subheader__search">
          <input type="text" class="form-control" name='search' placeholder="بحث بالاسم..." id="generalSearch">
          <span class="kt-input-icon__icon kt-input-icon__icon--right">
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <rect x="0" y="0" width="24" height="24"></rect>
                  <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                  <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                </g>
              </svg>
              <!--<i class="flaticon2-search-1"></i>-->
            </span>
          </span>
        </div>
      </form>
    </div>
    <div class="kt-portlet__head-toolbar">
      <div class="kt-portlet__head-wrapper">
        <div class="kt-portlet__head-actions">
          <a href="{{url('admin/embassador/create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
            <i class="la la-plus"></i>
            اضافة سفير
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="kt-portlet__body">
    <div class="form-group row">
      <div class="col-lg-12">

        <div class="form-group {{ $errors->has( 'agent' ) ? 'has-error' : '' }}">
          <label> اختار الشريك </label>
          <form>
            <div class="row">
              <div class="col-md-5">
                <select class="form-control " name="agent" id="agentname">
                  <option value="0">اختر الوكيل</option>

                  @foreach ($agents as $agent)
                  <option value="{{$agent->id}}" @if($agent->id == $agent_id) selected="selected" @endif >
                    {{$agent->name}}
                    @endforeach
                </select>

                @if( $errors->has( 'agent' ) )
                <span class="help-block text-danger">
                  {{ $errors->first( 'agent' ) }}
                </span>
                @endif
              </div>
              <div class=>
                <button type="submit" class="btn btn-brand btn-elevate btn-icon-sm">بحث</button></div>
            </div>
          </form>
        </div>

        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
          <thead>
            <tr>
              <th>المدينة</th>
              <th>الاسم الاول</th>
              <th>الاسم الثانى</th>
              <th>الاميل</th>
              <th>رقم التليفون</th>
              <th> تاريخ الميلاد</th>
              <th> اسم الشريك</th>
              <th>رقم السفير</th>
              <th>العمليات</th>
            </tr>
          </thead>
          <tbody id='table-result'>
            @foreach($embassadors as $embassador)
            <tr>
              <td>{{$embassador->city_name}}</td>
              <td>{{$embassador->first_name}}</td>
              <td>{{$embassador->second_name}}</td>
              <td>{{$embassador->email}}</td>
              <td>{{$embassador->phone}}</td>
              <td>{{$embassador->birth_date}}</td>

              <td>{{$embassador->agent_name}}</td>
              <td>{{$embassador->embassador_id}}</td>

              <td>
                <a href="{{ route('admin.embassador.edit', $embassador->embassador_id)}}" class="btn btn-primary">تعديل</a>
              </td>
              <!-- <td>
                <form action="{{ route('admin.embassador.destroy', $embassador->embassador_id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">حذف</button>
                </form>
              </td> -->
            </tr>

            @endforeach
          </tbody>

        </table>
        <!--end: Datatable -->
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-5">
          <div class="col-sm-12 col-md-7 dataTables_pager">
            <div class="dataTables_length" id="kt_table_1_length">
            </div>
            <div class="dataTables_paginate paging_simple_numbers" id="kt_table_1_paginate">

            </div>

          </div>

        </div>

      </div>
    </div>
    {{ $embassadors->onEachSide(50)->links() }}

  </div>
</div>


@endsection