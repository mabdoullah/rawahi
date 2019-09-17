@extends('admin.master.app')

@section('content')



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
بيانات  الوكلاء      </h3>
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
          <th colspan="2">العمليات</th>

        </tr>
      </thead>
      <tbody id='table-result'>
        @foreach($all_agents_cities as $agent)

        <tr>
          <td>{{$agent->city_name}}</td>
          <td>{{$agent->name}}</td>
          <td class="d-none d-lg-block">{{$agent->email}}</td>
          <td>{{$agent->phone}}</td>
          <td>{{$agent->birth_date}}</td>
          <td>
            <a href="{{ route('agent.edit', $agent->agent_id)}}" class="btn btn-primary">تعديل</a>
          </td>
          <td>
            <form action="{{ route('agent.destroy', $agent->agent_id)}}" method="post">
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
        {{ $all_agents_cities->onEachSide(1)->links() }}

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