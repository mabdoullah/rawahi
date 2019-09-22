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

<div class="kt-portlet kt-portlet--mobile">
  <!-- <form style="margin:20px 20px 20px 0">
    <select name='type' id="search-type" class="form-control col-md-4 " style=" float: right;">
      <option value=''> طريقة البحث </option>
      <option value='email'> الاميل </option>
      <option value='Number'> رقم الهاتف </option>
      <option value='Name'> بالاسم </option>
    </select>

    <div class="form-group" id="search-input-div" style="">
      <input class="form-control col-md-4" type="text" id="search-input" style=" float: right; margin-right:7px;">
      <button class="btn btn-primary " id="search-button" style="margin: 0 19px;"> بحث </button>
    </div>
  </form> -->
  
  

  <div class="kt-portlet__head kt-portlet__head--lg">
    <div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon">
        <i class="kt-font-brand flaticon2-line-chart"></i>
      </span>
      <h3 class="kt-portlet__head-title">
        بيانات الوكلاء </h3>
        <form class="kt-margin-l-20" id="kt_subheader_search_form" action="{{route('admin.agent.index') }}">
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
          <a href="/admin/agent/create" class="btn btn-brand btn-elevate btn-icon-sm">
            <i class="la la-plus"></i>
            اضافة شريك
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
          <th>الاسم</th>
          <th>الاميل</th>
          <th>رقم التليفون</th>
          <th> تاريخ الميلاد</th>
          <th>العمليات</th>

        </tr>
      </thead>
      <tbody id='table-result'>
        @foreach($agents as $agent)
        <tr>
          <td>{{$agent->city_name}}</td>
          <td>{{$agent->name}}</td>
          <td class="d-none d-lg-block">{{$agent->email}}</td>
          <td>{{$agent->phone}}</td>
          <td>{{$agent->birth_date}}</td>
          <td>
            <a href="{{ route('admin.agent.edit', $agent->agent_id)}}" class="btn btn-primary">تعديل</a>
          </td>
          <!-- <td>
            <form action="{{ route('admin.agent.destroy', $agent->agent_id)}}" method="post">
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
          {{ $agents->onEachSide(1)->links() }}
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

<!--
@section('script')
<script>
  $(document).ready(function() {
    $('#search-input-div').hide()

    $('#search-type').on('change', function() {
      $('#search-input-div').show()
    });

    $('#search-button').on('click', function(event) {
      event.preventDefault();
      var type = $('#search-type').val();
      var data = $('#search-input').val();

      if (type != '' && data != '') {
        $.ajax({
          type: "GET",
          url: "/admin/search",
          dataType: 'json',
          data: {
            type: type,
            data: data
          },
          success: function(response) {
            $('#table-result').html("")

            console.log(response.agents.length);
            if (response.agents.length > 0) {
              $.each(response.agents, function(i, item) {
                var $tr = $('<tr>').append(
                  $('<td>').text(item.city),
                  $('<td>').text(item.name),
                  $('<td> ').text(item.email),
                  $('<td>').text(item.phone),
                  $('<td>').text(item.birth_date),




                  $('<td>').text(""),

                  $('<td ">'),

                  // $('<td>').html"( <button class="btn btn-danger" type="submit">Delete</button>)"
                )
                $('#table-result').append($tr)
              });

            } else {

              var $tr = $('<tr>').append(
                $('<th colspan="5">').text(response.message),
              )
              $('#table-result').append($tr);
            }

          },
          error: function(err) {
            console.log(err);
          }
        });
      }
    });
  })
</script>
@stop -->