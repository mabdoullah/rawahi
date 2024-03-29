@extends('admin.master.app')
@section('content')

@if(session()->has('message'))
<div class="col-12">
  <div class="alert alert-success text-center" style="display:inline-block; width: 100% " role="alert">
    <div class="alert-text"></div>

    {{ session()->get('message') }}
  </div>
</div>
@endif
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
  

        
        
          <div class="kt-portlet__head kt-portlet__head--lg row">
          <div class="kt-portlet__head-label col-12">
              
          
                <form action="{{route('admin.searchpartners')}} " class="kt-margin-l-20" style="width:100%;margin:auto;">
                <div class="row kt-input-icon kt-input-icon--right kt-subheader__search">
                <div class=" {{ $errors->has( 'agent' ) ? 'has-error' : '' }}"></div>
                <div class="col ">
                <input type="search"  class="form-control" name="search" id="searchpartner"  placeholder="بحث باسم الشريك..." value='' >
                  @if( $errors->has( 'search' ) )
                  <span class="help-block text-danger">
                    {{ $errors->first( 'search' ) }}
                  </span>
                  @endif
              
                  </div> 
           <div class="col">
            
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

             <div class="col">
            <select class="form-control" name="ambassador" id="ambassador">
        

                <option value="">اختر السفير </option>
                </select>
    
                @if( $errors->has( 'ambassador' ) )
                <span class="help-block text-danger">
                  {{ $errors->first( 'ambassador' ) }}
                </span>
                @endif
                </div> 
                <div class="col-1">
            <button  type="submit" class='btn btn-primary'> بحث</button>
                </div>   
                
                </div>
          </form>
       
        </div>
        </div>
        <div class="kt-portlet__body">
    <div class=" row">
      <div class="col-lg-12">
        <!--begin: Datatable -->
        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
          <thead>
            <tr>
                <th>إسم الشريك</th>
                <th>الايميل </th>
                <th>التليفون</th>
                <th>المدينة </th>
                <th>السفير</th>
               
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
                    <p class="text-center mb-1">{{$partner->ambassador->first_name}}  </p>
                    <div class="text-center">
                    <label class="ambassador-id text-center">{{$partner->ambassador->generate_id}}</label>
                    </div>
                  </td>
                 
           
              <td>
               {{-- edit  --}}
                      <a class="btn btn-primary" href="{{route('admin.partners.edit',$partner->id)}}"> تعديل <i
                      class="icofont-edit"></i>
                      </a>  
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
               url:"{{url('admin/get-ambassador-list')}}?agent_id="+agentID,
               success:function(res){
                  
                  $("#ambassador").empty();
                  if(res){
                      $("#ambassador").append("<option value=''>اختر السفير</option>");
                      $.each(res,function(key,value){
                          $("#ambassador").append("<option value='"+key+"'>"+value+"</option>");
                      });
                  }
               }
            });
    }else{
        $("#ambassador").empty();
        $("#agent").empty();
    }
   });





  $('#ambassador').on('change',function(){
  var ambassadorID = $(this).val();    
  if(ambassadorID){
      $.ajax({
         type:"GET",
         url:"{{url('admin/get-partner-list')}}?ambassador_id="+ambassadorID,
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