@extends('front.master.app')

@section('content')
        <!--Breadcrumb section starts-->
        <div class="breadcrumb-section" style="background-image: url(images/breadcrumb/breadcrumb-1.jpg)">
            <div class="overlay op-5"></div>
            <div class="container-fluid">
                <div class="row align-items-center  pad-top-80">
                    <div class="col-12">
                        <div class="breadcrumb-menu text-center">
                            <ul>
                                <li class="active"><a href="#">الرئيسية</a></li>
                                <li>
                                    <h2 class="page-title ">الشركاء</h2>
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

                            <div class="tab-pane fade show active" id="general_info">
                                <h4 class="text-center"> <i class="ion-ios-information"></i> الشركاء</h4>
                                

                             @if(!count($partners))
                              <div class="alert alert-info text-center" role="alert">
                                <h4>عفوا لا يوجد شركاء لعرضها</h4>
                              </div>
                              @else
                              @if(!asset(session()->has('success')))
                              <div class="alert alert-success text-center" role="alert">
                              {{ session()->get('success') }}
                              </div>
                             @endif
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                              <th scope="col">إسم الشريك</th>
                                              <th scope="col">الايميل </th>

                                              <th scope="col">التليفون</th>
                                            <th scope="col">تعديل بروفايل الشريك</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($partners as $partner)
                                        <tr>
                              


                                            <td>{{$partner->legal_name}}</td>
                                            <td>{{$partner->email}}</td>

                                            <td>{{$partner->phone}}</td>
                                            
                                        
                                            <td>
                                     
                                        </form>      
                                        {{--  edit --}}
                                               <a class="btn v8 view-buttons" href="{{route('partners.edit',$partner->id)}}"> تعديل <i
                                                class="icofont-edit"></i>
                                                </a>
                                        {{--  show --}}
                                            <input type="hidden" id='partner_id' name='partner_id' value="{{$partner->id}}">
                                            <a type="button" id ="show_button" class="btn v8 view-buttons"  data-toggle="modal"data-target="#exampleModal"   href="{{route('partners.show',$partner->id)}}"> عرض <i class="icofont-eye-alt"></i></a>
                                            
                                        {{--  delete --}}
                                            <button type="button" class="view-buttons btn v8 deleterow" data-partid="{{$partner->id}}" data-toggle="modal" data-target="#delete">حذف
                                            <i class="icofont-ui-delete"></i>
                                            </button> 
                                                
                                            </td>
                                            
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <!-- start deleteconfirmation Modal -->
                                    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <form action="{{route('partners.destroy','test')}}" method="post">
                                                    @csrf
                                                    @method('DELETE')

                                            <div class="modal-body">
                                                <p class="text-center">? Are you sure delete this  </p>
                                                <input type="hidden" name="partner_id" id="partner_id" value="">

                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No,cancel</button>
                                            <button type="submit" class="btn btn-primary">yes,Delete</button>
                                            </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- end deleteconfirmation Modal -->
                                     {!! $partners->links()!!}    
                                @endif
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header ">
                                                <h5 class="modal-title " id="exampleModalLabel"> بيانات الشريك</h5>
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
                                                                <div class="col-md-4">
                                                                    <div class="profile-img" >
                                                                        <img src="" alt="" srcset="" id="show-image">

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label > الاسم الشريك</label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p id="show-name"> </p>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label>البريد الالكتروني</label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p id="show-email"></p>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                        <label>العنوان</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p id="show-address"></p>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                            <label>رقم الجوال</label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p id="show-phone"></p>
                                                                        </div>
                                                                     

                                                                    </div>

                                                                </div>



                                                            </div>

                                                          
                                                            
                                                            <div class="row">
                                                                <div class="col-md-3 col-12">
                                                                    <label>وصف الشريك </label>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <p id="show-about"></p>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--view page ends-->

    @endsection
@push('jqueryCode')
<script type="text/javascript">
    /* Updated new Item */
    $("#show_button").click(function(e){
        e.preventDefault();
        var show_action = $("#show_button").attr("href");
        console.log(show_action);
        var id =  $('#partner_id').val();
        $.ajax({
            dataType: 'json',
            type:'GET',
            url: show_action,
            data:{id:id},
            success: function(response){
          // Add response in Modal body
          var img=response['image'];
          var image="./images/partners/"+img;
          $('#myTabContent').find('p').empty();
          $('#show-image').attr('src',image);
          $('#show-name').append(response['legal_name']);
          $('#show-email').append(response['email']);
          $('#show-address').append(response['map_address']);
          $('#show-phone').append(response['phone']);
          $('#show-about').append(response['about']);

          
     
      }
      });
    });
    </script>
<script>
        $('#delete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) ;
            var partner_id = button.data('partid') ;
            var modal = $(this);
            modal.find('.modal-body #partner_id').val(partner_id);
      })
      
        
</script>
      
@endpush