@extends('front.master.app')

@section('content')
        <!--Breadcrumb section starts-->
        <div class="breadcrumb-section" >
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
                        <div class="view-page tab-content mar-tb-30 add_list_content">

                            <div class="tab-pane fade show active" id="general_info">
                                <h4 class="text-center"> <i class="ion-ios-information"></i> الشركاء</h4>
                                @if(session()->has('master_error'))
                                <div class="alert alert-danger text-center" role="alert">
                                  {{ session()->get('master_error') }}
                                </div>
                                @endif
                                @if(session()->has('message'))
                                <div class="alert alert-success text-center" role="alert">
                                {{ session()->get('message') }}
                                </div>
                                @endif
                             @if(!count($partners))
                              <div class="alert alert-info text-center" role="alert">
                                <h4>عفوا لا يوجد شركاء لعرضها</h4>
                              </div>
                              @else
                              <div class="over-flo">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                              <th scope="col">إسم الشريك</th>
                                              <th scope="col">الايميل </th>

                                              <th scope="col">التليفون</th>.
                                              <th scope="col">المدينة</th>
                                              <th scope="col">صوره الشريك</th>

                                            <th scope="col">تعديل بروفايل الشريك</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($partners as $partner)
                                        <tr>



                                            <td>{{$partner->legal_name}}</td>
                                            <td>{{$partner->email}}</td>

                                            <td>{{$partner->phone}}</td>
                                            <td>{{$partner->citydata->name}}</td>
                                            <td><img src="images/partners/{{$partner->image}}" alt="partnerimg" class="imgpartner img-fluid"></td>



                                            <td>

                                        </form>
                                        {{--  edit --}}
                                               <a class="btn v8 view-buttons" href="{{route('partners.edit',$partner->id)}}"> تعديل <i
                                                class="icofont-edit"></i>
                                                </a>
                                        {{--  show --}}
                                            <a type="button"  class="btn v8 view-buttons show_button"  data-toggle="modal"data-target="#show"   href="{{route('partners.show',$partner->id)}}"> عرض <i class="icofont-eye-alt"></i></a>

                                        {{--  delete --}}
                                            {{-- <button type="button" class="view-buttons btn v8 deleterow" data-partid="{{$partner->id}}" data-toggle="modal" data-target="#delete">حذف
                                            <i class="icofont-ui-delete"></i>
                                            </button>  --}}

                                            </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>    

                                <!-- start deleteconfirmation Modal -->
                                     @include('front.partners.deletepartner')
                                <!-- end deleteconfirmation Modal -->
                                     {!! $partners->links()!!}
                                @endif
                                <div class="modal fade" id="show" tabindex="-1" role="dialog"
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
                                                     <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active" id="home-tab"
                                                                        data-toggle="tab" href="#home" role="tab"
                                                                        aria-controls="home"
                                                                        aria-selected="true">البيانات</a>
                                                                </li>

                                                            </ul>
                                                    <div class="tab-content profile-tab" id="myTabContent">
                                                        <div class="tab-pane fade profile show active" id="home"
                                                            role="tabpanel" aria-labelledby="home-tab">
                                                            <div class="row data-right-top">
                                                                <div class="col-md-4" id="img" >
                                                                    <div class="profile-img" >
                                                                        <img src=""  id="show-image">

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="row">
                                                                        <div class="col-md-6 ">
                                                                            <label  id='namep'> الاسم الشريك</label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p id="show-name"> </p>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label id='email'>البريد الالكتروني</label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p id="show-email"></p>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                        <label id="address">العنوان</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p id="show-address"></p>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                            <label id="phone">رقم الجوال</label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p id="show-phone"></p>
                                                                        </div>


                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                    <div class="col-md-3 col-12">
                                                                        <label id="part-type">نوع الشريك </label>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <p id="show-part-type"></p>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <label id="citydata">المدينة</label>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <p id='show-city'> </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3 col-12">
                                                                        <label id="facebook">الفيس بوك </label>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <p id="show-facebook"> </p>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <label id="insatgram"> انستجرام</label>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <p id='show-insatgram'> </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3 col-12">
                                                                        <label id="twitter">التوتير</label>
                                                                    </div>
                                                                    <div class="col-md-3 col-12">
                                                                        <p id='show-twitter'> </p>
                                                                    </div>
                                                                    
                                                                </div>
                                                            <div class="row">
                                                                   
                                                                <div class="col-md-3 col-12">
                                                                    <label id='about'>وصف الشريك </label>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <p id="show-about"></p>
                                                                </div>

                                                            </div>
                                                         </div>
                                                    {{--<div class="tab-pane fade" id="profile" role="tabpanel"
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
                                            </div> --}}
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
    $(".show_button").click(function(e){
        e.preventDefault();
        var show_action = $(this).attr("href");
        var id =  $(this).val();
        $.ajax({
            dataType: 'json',
            type:'GET',
            url: show_action,
            data:{id:id},
            success: function(response){
          // Add response in Modal body
          var img=response['partner']['image'];
          var image="./images/partners/"+img;
          $('#myTabContent').find('p').empty();
         
          if (response['partner']['image']) {
            $('#show-image').attr('src',image);
          }else{
            document.getElementById("img").style.display = "none";

          }

          if (response['partner']['legal_name']) {
            $('#show-name').append(response['partner']['legal_name']);
          }else{
            document.getElementById("namep").style.display = "none";

          }
          if (response['partner']['email']) {
            $('#show-email').append(response['partner']['email']);
          }else{
            document.getElementById("email").style.display = "none";

          }
          if (response['partner']['map_address']) {
            $('#show-address').append(response['partner']['map_address']);
          }else{
            document.getElementById("address").style.display = "none";

          }
          if (response['partner']['phone']) {
     
            $('#show-phone').append(response['partner']['phone']);
          }else{
            document.getElementById("phone").style.display = "none";

          }
        
          if (response['partner']['about']) {

          $('#show-about').append(response['partner']['about']);

        }else{
          document.getElementById("about").style.display = "none";
          }
        if (response['partner']['partner_type']) {

            $.each(response['types'], function( index, value ) {
                
                if (response['partner']['partner_type']==index) {
                    $('#show-part-type').append(value);

                }
});
      
        }else{
        document.getElementById("part-type").style.display = "none";
        } 
        if (response['partner']['citydata']['name']) {
        $('#show-city').append(response['partner']['citydata']['name']);

        }else{
        document.getElementById("citydata").style.display = "none";
        }  

        if (response['partner']['facebook']) {
        $('#show-facebook').append(response['partner']['facebook']);

        }else{
        document.getElementById("facebook").style.display = "none";
        }  

        if (response['partner']['instagram']) {
        $('#show-insatgram').append(response['partner']['instagram']);

        }else{
        document.getElementById("instagram").style.display = "none";
        }   
        if (response['partner']['twitter']) {
        $('#show-twitter').append(response['partner']['twitter']);

        }else{
        document.getElementById("twitter").style.display = "none";
        }    
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
