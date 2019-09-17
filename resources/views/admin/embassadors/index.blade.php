@extends('admin.master.app')

@section('content')



<div class="kt-portlet kt-portlet--mobile">

  <div class="kt-portlet__head kt-portlet__head--lg">
    <div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon">
        <i class="kt-font-brand flaticon2-line-chart"></i>
      </span>
      <h3 class="kt-portlet__head-title">
بيانات السفراء      </h3>
    </div>

    <div class="kt-portlet__head-toolbar">
      <div class="kt-portlet__head-wrapper">
        <div class="kt-portlet__head-actions">
          <a href="/admin/embassador/create" class="btn btn-brand btn-elevate btn-icon-sm">
            <i class="la la-plus"></i>
            اضافة سفير
          </a>
        </div>

      </div>
    </div>

  </div>
  <div class="kt-portlet__body">
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

          <th colspan="2">العمليات</th>

        </tr>
      </thead>
      <tbody id='table-result'>
        @foreach($all_embassdors_cities as $embassador)
        <tr>
          <td>{{$embassador->city_name}}</td>
          <td>{{$embassador->first_name}}</td>
          <td>{{$embassador->second_name}}</td>
          <td class="d-none d-lg-block">{{$embassador->email}}</td>
          <td>{{$embassador->phone}}</td>
          <td>{{$embassador->birth_date}}</td>
          <td>{{$embassador->agent_name}}</td>


          <td>
            <a href="{{ route('embassador.edit', $embassador->embassador_id)}}" class="btn btn-primary">تعديل</a>
          </td>
          <td>
            <form action="{{ route('embassador.destroy', $embassador->embassador_id)}}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">حذف</button>
            </form>
          </td>
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
        {{ $all_embassdors_cities->onEachSide(50)->links() }}

        </div>
        <div class="dataTables_paginate paging_simple_numbers" id="kt_table_1_paginate">

        </div>
      </div>
    </div>
  </div>
</div>

</div>
</div>


@endsection
