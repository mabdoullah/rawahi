@extends('front.master.app')

@section('content')
<!--Breadcrumb section starts-->
       <div class="breadcrumb-section" >
           <div class="overlay op-5"></div>
           <div class="container">
               <div class="row align-items-center  pad-top-80">
                   <div class="col-12">
                       <div class="breadcrumb-menu text-center">
                           <ul>
                               <li class="active"><a href="{{route('index')}}">الرئيسية</a></li>
                               <li>
                                   <h2 class="page-title ">السفراء</h2>
                               </li>
                           </ul>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!--Breadcrumb section ends-->
       <!--view page starts-->
       <div class="list-details-section section-padding add_list pad-top-50" id="tabsContainer">
           <div class="container-fluid">
               <div class="row">
                   <div class="col-md-12">
                       <div class="tab-content mar-tb-30 add_list_content">

                           <div class="tab-pane fade show active" >
                               <h4 class="text-center"> <i class="ion-ios-information"></i> السفراء</h4>
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
                               @if(!count($all_embassdors_cities))
                               <div class="alert alert-info text-center" role="alert">
                                 <h4 class="white">عفوا لا يوجد سفراء لعرضها</h4>
                                </div>
                               @else
                               <table class="table">
                                   <thead class="thead-dark">
                                       <tr>
                                           <th scope="col">إسم السفير</th>
                                           <th scope="col">البريد الالكتروني </th>
                                           <th scope="col">الجوال </th>
                                           <th scope="col"> المدينة</th>
                                           <th scope="col">تعديل بروفايل السفير</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                     @foreach($all_embassdors_cities as $embassador)
                                       <tr>
                                           <td>{{$embassador->first_name}}</td>
                                           <td>{{$embassador->email}}</td>
                                           <td>{{$embassador->phone}}</td>
                                           <td>{{$embassador->city_name}}</td>
                                           <td>
                                             <!-- edit -->
                                             <a class="btn v8 view-buttons"  href="{{route('embassador.edit',$embassador->embassador_id)}}"> تعديل <i class="icofont-edit"></i></a>
                                             <!-- show -->
                                             <a type="button"  data-showembassid ="{{$embassador->embassador_id}}" class="btn v8 view-buttons show_button"  data-toggle="modal"data-target="#exampleModal"   href="{{route('embassador.show',$embassador->embassador_id)}}"> عرض <i class="icofont-eye-alt"></i></a>
                                                <!-- delete -->
                                              {{--<button  class="v8 btn view-buttons" data-toggle="modal" data-embassadorid="{{$embassador->embassador_id}}" data-target="#DeleteModal" > حذف<i class="icofont-ui-delete"></i></button>--}}
                                          </td>

                                       </tr>

                                       @endforeach
                                   </tbody>
                               </table>
                               {{ $all_embassdors_cities->links() }}
                               @endif
                              @include('front.global.delete_modal')
                              @include('front.embassadors.show_modal')
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>

@endsection
@push('jqueryCode')
<script type="text/javascript">
/* Updated new Item */
$(".show_button").click(function(e){
    e.preventDefault();
    var show_action = $(this).attr("href");
    var id= $(this).data('showembassid');
    $.ajax({
        dataType: 'json',
        type:'GET',
        url: show_action,
        data:{id:id},
        success: function(response){
      // Add response in Modal body
      $('#myTabContent').find('p').empty();
      $('#show_first_name').append(response['first_name']);
      $('#show_second_name').append(response['second_name']);
      $('#show_email').append(response['email']);
      $('#show_phone').append(response['phone']);
      $('#show_phone_key').append(response['phone_key']);
      $('#show_city').append(response['city_name']);
      $('#show_country').append('السعودية العربية');
      $('#show_birth_date').append(response['birth_date']);
  }
  });
});
</script>
<script type="text/javascript">
  $('#DeleteModal').on('show.bs.modal', function (e) {
      var button = $(e.relatedTarget);
    var embassador_id=button.data('embassadorid');
    var modal=$(this);
    modal.find('.modal-body #delete_id').val(embassador_id);
  });
  function formSubmit()
      {
          $("#deleteForm").submit();
      }
</script>
@endpush
