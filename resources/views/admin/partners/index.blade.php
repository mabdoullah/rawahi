@extends('admin.master.app')
@section('content')
<div class="kt-portlet kt-portlet--mobile">
  <div class="kt-portlet__head kt-portlet__head--lg">
    <div class="kt-portlet__head-label">
      <span class="kt-portlet__head-icon">
        <i class="kt-font-brand flaticon2-line-chart"></i>
      </span>
      <h3 class="kt-portlet__head-title">
        بيانات الشريك </h3>
    </div>

    <div class="kt-portlet__head-toolbar">
      <div class="kt-portlet__head-wrapper">
        <div class="kt-portlet__head-actions">
          <a href="/admin/partners/create" class="btn btn-brand btn-elevate btn-icon-sm">
            <i class="la la-plus"></i>
            اضافة الشريك
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="kt-portlet__body">
    <div class="form-group row">
      <div class="col-lg-12">

        <div class="form-group {{ $errors->has( 'agent' ) ? 'has-error' : '' }}">
        
          
          <div class="row">
              
              <div class="col-3 form-group">
                <form action="{{route('admin.searchpartners')}} ">
                <input type="search"  class="form-control" name="search" id="searchpartner"  placeholder="بحث باسم الشريك..." value='' >
                  @if( $errors->has( 'search' ) )
                  <span class="help-block text-danger">
                    {{ $errors->first( 'search' ) }}
                  </span>
                  @endif
              
                  </div> <br><br>
           <div class="col-3">
            
            <select class="form-control " name="agent" id="agent">
            <option value="" selected>اختر الوكيل</option>

            @foreach($agents as $key => $agent)
            <option value="{{$key}}"> {{$agent}}</option>
            @endforeach
            </select>

            @if( $errors->has( 'agent' ) )
            <span class="help-block text-danger">
              {{ $errors->first( 'agent' ) }}
            </span>
            @endif
          
            </div> 

             <div class="col-3">
            <select class="form-control " name="embassador" id="embassador generalSearch">
        

                <option value="">اختر السفير </option>
                </select>
    
                @if( $errors->has( 'embassador' ) )
                <span class="help-block text-danger">
                  {{ $errors->first( 'embassador' ) }}
                </span>
                @endif
                </div> 
                <div class="col-1">
            <button  type="submit" class='btn btn-primary'> ابحث</button>
                </div>
          </form>
        </div>
        </div>

        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
          <thead>
            <tr>
                <th>إسم الشريك</th>
                <th>الايميل </th>
                <th>التليفون</th>
                <th>المدينة </th>
                <th>تعديل بروفايل الشريك</th>
            </tr>
          </thead>
          <tbody id='table-result'>
            
            
                  
                      
           
              
                  @foreach($partners as $partner)
              
              <tr>



                  <td>{{$partner->legal_name}}</td>
                 <td>{{$partner->email}}</td>

                  <td>{{$partner->phone}}</td>


                  <td>{{$partner->map_address}}</td>

              <td>
               {{-- edit  --}}
                      {{-- <a class="btn v8 view-buttons" href="{{route('partners.edit',$partner->id)}}"> تعديل <i
                      class="icofont-edit"></i>
                      </a> --}}
              {{--  show --}}
                  {{-- <a type="button"  class="btn v8 view-buttons show_button"  data-toggle="modal"data-target="#show"   href="{{route('partners.show',$partner->id)}}"> عرض <i class="icofont-eye-alt"></i></a> --}}

              {{--  delete --}}
                  {{-- <button type="button" class="view-buttons btn v8 deleterow" data-partid="{{$partner->id}}" data-toggle="modal" data-target="#delete">حذف
                  <i class="icofont-ui-delete"></i>
                  </button>  --}}

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
            </div>
            <div class="dataTables_paginate paging_simple_numbers" id="kt_table_1_paginate">

            </div>

          </div>

        </div>

      </div>
    </div>
    {{-- {{ $partners->links() }} --}}

  </div>
</div>


@endsection
@push('jqueryCode')
    

<script type="text/javascript">
 



 $('#agent').change(function(){
    var agentID = $(this).val(); 
     if(agentID){
            $.ajax({
               type:"GET",
               url:"{{url('admin/get-embassador-list')}}?agent_id="+agentID,
               success:function(res){
                  console.log(res);
                  $("#embassador").empty();
                  if(res){
                      $("#embassador").append("<option value=''>اختر السفير</option>");
                      $.each(res,function(key,value){
                          $("#embassador").append("<option value='"+key+"'>"+value+"</option>");
                      });
                  }
               }
            });
    }else{
        $("#embassador").empty();
        $("#agent").empty();
    }
   });





  $('#embassador').on('change',function(){
  var embassadorID = $(this).val();    
  if(embassadorID){
      $.ajax({
         type:"GET",
         url:"{{url('admin/get-partner-list')}}?embassador_id="+embassadorID,
         success:function(res){               
          if(res){
            $('#table-result').html("")
              $.each(res,function(key,value){
                var $tr = $('<tr>').append(
                $('<td>').text(""),

                $('<td class="d-none d-lg-block">').text(value.legal_name),
                $('<td>').text(value.name),
                $('<td class="d-none d-lg-block"> ').text(value.email),

                $('<td>').text(value.phone),
                $('<td>').text(value.id),
              )
            });
         
          }else{
           
            $("#partner").empty();
          }
         }
      });
  }else{
    $('#table-result').append($tr) ;
  }
      
 });
</script>
@endpush