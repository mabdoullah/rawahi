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
                                 <h4>عفوا لا يوجد سفراء لعرضها</h4>
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
                                             <a class="btn v8 view-buttons" href="{{route('embassador.edit',$embassador->embassador_id)}}"> تعديل <i class="icofont-edit"></i></a>
                                             <!-- show -->
                                             <input type="hidden" id='embassador_id' name='embassador_id' value="{{$embassador->embassador_id}}">
                                             <a type="button" id ="show_button" class="btn v8 view-buttons"  data-toggle="modal"data-target="#exampleModal"   href="{{route('embassador.show',$embassador->embassador_id)}}"> عرض <i class="icofont-eye-alt"></i></a>
                                                <!-- delete -->
                                                <button  class="v8 btn view-buttons" data-toggle="modal" data-embassadorid="{{$embassador->embassador_id}}" data-target="#DeleteModal" > حذف<i class="icofont-ui-delete"></i></button>
                                           </td>

                                       </tr>

                                       @endforeach
                                   </tbody>
                               </table>
                               {{ $all_embassdors_cities->links() }}
                               @endif


                              <!-- start delete modal -->
                              <div id="DeleteModal" class="modal fade " role="dialog" >
                                 <div class="modal-dialog ">
                                   <!-- Modal content-->
                                   <form action="{{route('embassador.destroy','default')}}" id="deleteForm" method="post">
                                       <div class="modal-content ">
                                           <div class="modal-header">
                                        
                                               <h5 class="modal-title "> تاكيد الحذف</h5>
                                               <button type="button" class="close" data-dismiss="modal">&times;</button>
                                           </div>
                                           <div class="modal-body">
                                               {{ csrf_field() }}
                                               {{ method_field('DELETE') }}
                                               <p class="text-center">هل انت متاكد ؟</p>
                                               <input type="hidden" id='delete_id' name='delete_id' value="">

                                           </div>
                                           <div class="modal-footer">
                                               <div>
                                                   <button type="submit" name="" class="btn btn-secondary" data-dismiss="modal" onclick="formSubmit()">نعم</button>
                                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                               </div>
                                           </div>
                                       </div>
                                   </form>
                                 </div>
                                </div>
                                <!-- end delete modal -->


                               <!-- start show modal -->
                               <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                   aria-labelledby="exampleModalLabel" aria-hidden="true">
                                   <div class="modal-dialog" role="document">
                                       <div class="modal-content">
                                           <div class="modal-header ">
                                               <h5 class="modal-title " id="exampleModalLabel"> بيانات السفير</h5>
                                               <button type="button" class="sm-left close" data-dismiss="modal"
                                                   aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                               </button>
                                           </div>
                                           <div class="modal-body">
                                               <form method="post">
                                                   <div class="row">


                                                   </div>
                                           </div>
                                           <div class="row">

                                               <div class="col-md-12">
                                                   <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                               <li class="nav-item">
                                                                   <a class="nav-link active" id="home-tab"
                                                                       data-toggle="tab" href="#home" role="tab"
                                                                       aria-controls="home"
                                                                       aria-selected="true">البيانات</a>
                                                               </li>

                                                           </ul> -->
                                                   <div class="tab-content profile-tab" id="myTabContent">
                                                       <div class="tab-pane fade profile show active" id="home"
                                                           role="tabpanel" aria-labelledby="home-tab">
                                                           <div class="row data-right-top">
                                                               <!-- <div class="col-md-4">
                                                                   <div class="profile-img ">
                                                                       <img src="images/profile.png" alt="" />

                                                                   </div>
                                                               </div> -->
                                                               <div class="col-md-12">
                                                                   <div class="row">
                                                                       <div class="col-md-6">
                                                                           <label> الاسم الاول</label>
                                                                       </div>
                                                                       <div class="col-md-6">
                                                                           <p id="show_first_name"> </p>
                                                                       </div>

                                                                       <div class="col-md-6">
                                                                           <label>الأسم الأخير</label>
                                                                       </div>
                                                                       <div class="col-md-6">
                                                                           <p id="show_second_name"></p>
                                                                       </div>

                                                                       <div class="col-md-6">
                                                                           <label>البريد الالكتروني</label>
                                                                       </div>
                                                                       <div class="col-md-6">
                                                                           <p id="show_email"></p>
                                                                       </div>

                                                                   </div>
                                                               </div>
                                                           </div>

                                                           <div class="row">
                                                             <div class="col-md-3 col-12">
                                                                 <label>كود الدولة</label>
                                                             </div>
                                                             <div class="col-md-3 col-12">
                                                                 <p id ="show_phone_key"></p>
                                                             </div>
                                                               <div class="col-md-3 col-12">
                                                                   <label>رقم الجوال</label>
                                                               </div>
                                                               <div class="col-md-3 col-12">
                                                                   <p id="show_phone"> </p>
                                                               </div>
                                                           </div>
                                                           <div class="row">
                                                             <div class="col-md-3 col-12">
                                                                 <label>الدوله</label>
                                                             </div>
                                                             <div class="col-md-3 col-12">
                                                                 <p id="show_country"> </p>
                                                             </div>
                                                               <div class="col-md-3 col-12">
                                                                   <label>المدينة</label>
                                                               </div>
                                                               <div class="col-md-3 col-12">
                                                                   <p id ="show_city"></p>
                                                               </div>
                                                           </div>

                                                           <div class="row">
                                                               <div class="col-md-3 col-12">
                                                                   <label>تاريخ الميلاد</label>
                                                               </div>
                                                               <div class="col-md-3 col-12">
                                                                   <p id ="show_birth_date"></p>
                                                               </div>
                                                           </div>
                                                       </div>
                                                       <!-- <div class="tab-pane fade" id="profile" role="tabpanel"
                                                                   aria-labelledby="profile-tab">
                                                                   <div class="row">
                                                                       <div class="col-md-6">
                                                                           <label>Experience</label>
                                                                       </div>
                                                                       <div class="col-md-6">
                                                                           <p>Expert</p>
                                                                       </div>
                                                                   </div>
                                                                   <div class="row">
                                                                       <div class="col-md-6">
                                                                           <label>Hourly Rate</label>
                                                                       </div>
                                                                       <div class="col-md-6">
                                                                           <p>10$/hr</p>
                                                                       </div>
                                                                   </div>
                                                                   <div class="row">
                                                                       <div class="col-md-6">
                                                                           <label>Total Projects</label>
                                                                       </div>
                                                                       <div class="col-md-6">
                                                                           <p>230</p>
                                                                       </div>
                                                                   </div>
                                                                   <div class="row">
                                                                       <div class="col-md-6">
                                                                           <label>English Level</label>
                                                                       </div>
                                                                       <div class="col-md-6">
                                                                           <p>Expert</p>
                                                                       </div>
                                                                   </div>
                                                                   <div class="row">
                                                                       <div class="col-md-6">
                                                                           <label>Availability</label>
                                                                       </div>
                                                                       <div class="col-md-6">
                                                                           <p>6 months</p>
                                                                       </div>
                                                                   </div>
                                                                   <div class="row">
                                                                       <div class="col-md-12">
                                                                           <label>Your Bio</label><br />
                                                                           <p>Your detail description</p>
                                                                       </div>
                                                                   </div>
                                                               </div> -->
                                                   </div>
                                               </div>
                                           </div>
                                           </form>
                                           <button type="button" class="btn btn-secondary"
                                               data-dismiss="modal">أغلاق</button>
                                       </div>
                                       <!-- <div class="modal-footer">

                                           </div> -->
                                   </div>
                               </div>

                               <!-- end show modal -->

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
$("#show_button").click(function(e){
    e.preventDefault();
    var show_action = $("#show_button").attr("href");
    var id =  $('#embassador_id').val();
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
