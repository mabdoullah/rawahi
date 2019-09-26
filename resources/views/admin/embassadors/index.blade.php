@extends('admin.master.app')
@section('content')



  <div class='row'>
    @if(session()->has('master_error'))
    <div class="col-12">
      <div class="alert alert-danger text-center" style="display:inline-block; width: 100% " role="alert">
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

      </div>
      <div class="kt-portlet__head-label" style="width:85%">

        <form width="100%" class="kt-margin-l-20" style="margin:auto" id="kt_subheader_search_form" action="{{route('admin.embassador.index') }}">
          <div class="row kt-input-icon kt-input-icon--right kt-subheader__search">


          <div class="col-2">
              <select class="form-control " name="search_agent" id="agentname">
                <option value="">اختر الوكيل</option>

                @foreach ($agents as $agent)
                <option value="{{$agent->id}}" @if($agent->id == $searchByAgent) selected="selected" @endif >
                  {{$agent->name}}
                  @endforeach
              </select>

              @if( $errors->has( 'agent' ) )
              <span class="help-block text-danger">
                {{ $errors->first( 'agent' ) }}
              </span>
              @endif
            </div>
            <div class="col-3">
              <input type="text" class="form-control" name='search' placeholder="بحث بالاسم..." id="generalSearch" value="{{ old('search') ?? $searchByName ?? null }}">

            </div>

           
            <div class="col-3">
              <input type="text" class="form-control" name='search_byphone' placeholder="بحث برقم الجوال..." id="generalSearch" value="{{ old('searchByPhone') ?? $searchByPhone ?? null }}">
            </div>
            <div class="col-3">
              <input type="text" class="form-control" name='search_byemail' placeholder="بحث بالبريد الاكترونى..." id="generalSearch" value="{{ old('search_byemail') ?? $searchByEmail ?? null }}">
            </div>
            <div class="col-1">
              <button class="btn btn-primary" type="submit"> بحث </button>
            </div>

            </span>
          </div>
        </form>
      </div>
    </div>
    <div class="kt-portlet__body">
      <div class="form-group row">
        <div class="col-lg-12">
          <!--begin: Datatable -->
          <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
            <thead>
              <tr>
              <th>رقم السفير</th>

                <th>الاسم </th>
                <th>المدينة</th>
                <th>رقم التليفون</th>
                <th>البريد الاكترونى</th>

                <th> اسم الوكيل</th>
                <th>العمليات</th>
              </tr>
            </thead>
            <tbody id='table-result'>
              @foreach($embassadors as $embassador)
              <tr>
              <td>{{$embassador->embassador_id}}</td>

                <td>{{$embassador->first_name}} {{$embassador->second_name}}</td>
                <td>{{$embassador->city_name}}</td>

                <td>{{$embassador->phone}}</td>
                <td>{{$embassador->email}}</td>

                <td>{{$embassador->agent_name}}</td>

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

            </div>

          </div>

        </div>
      </div>
      {{ $embassadors->onEachSide(5)->links() }}

    </div>

  </div>
  
</div>
</div>


@endsection