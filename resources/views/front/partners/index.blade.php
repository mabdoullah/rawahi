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

                            {{-- @if(!count($partners))
                              <div class="alert alert-info text-center" role="alert">
                                <h4>عفوا لا يوجد شركاء لعرضها</h4>
                              </div>
                              @else--}}

<!--start search box -->
      <div class="filter-wrapper style1 v2 ">
           <div class="container">
               <div class="row">
                   <div class="col-md-12 pad-top-30 pad-bot-30">
                       <form action="{{route('partners.index')}}" id="searchForm" method="get" class="hero__form v2 filter">
                            <div class="row">
                                <div class="col-lg-2 col-md-12">
                                    <input type="text" id='search_name' name='search_name'placeholder="بحث بالأسم" value="{{ old('search_name') ?? $searchByName ?? null }}" class="hero__form-input custom-select">
                                </div>
                                <div class="col-lg-2 col-md-12">
                                    <input type="text" id='search_email' name='search_email'placeholder="بحث بالأميل" value="{{ old('search_email') ?? $searchByEmail ?? null }}" class="hero__form-input custom-select">
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <select class=" nice-select hero__form-input custom-select"  name="search_city" id="search_city">
                                         <option value="">اختر المدينة</option>
                                                @foreach ($cities as $city)
                                                 <option {{ (old('search_city', isset($searchByCity) ? $searchByCity:'' ) == $city->id) ? 'selected':''  }}  value="{{$city->id}}">
                                                {{$city->name}}
                                                 </option>
                                                   @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <select class=" nice-select hero__form-input custom-select"  name="search_type" id="search_type">
                                         <option value="">اختر نوع الشريك</option>
                                               @foreach ($types as $key=>$type)
                                                 <option {{ (old('search_type', isset($search_type) ? $search_type:'' ) == $key) ? 'selected':''  }}  value="{{$key}}">
                                                {{$type}}
                                                 </option>
                                                   @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-2 col-md-12 text-center">
                                    <button type="submit" name="" class="btn  v3" >بحث</button>
                                </div>
                             </div>
                       </form>
                    </div>
               </div>
            </div>
      </div>
<!--end search box -->

<!--start result table -->
    <div class="over-flo">
      <table class="table">
          <thead class="thead-dark">
              <tr>
                    <th scope="col">إسم الشريك</th>
                    <th scope="col">الايميل </th>
                    <th scope="col">التليفون</th>
                    <th scope="col">المدينة</th>
                    <th scope="col">صوره الشريك</th>
                  <th scope="col">تعديل بروفايل الشريك</th>
              </tr>
          </thead>
          <tbody>
            @if($partners)
            @php $count=0;@endphp
            @foreach($partners as $partner)
            @if($partner->citydata)
            @php   $count=$count+1; @endphp
              <tr>
                  <td>{{$partner->legal_name}}</td>
                  <td>{{$partner->email}}</td>
                  <td>{{$partner->phone}}</td>
                  <td>{{$partner->citydata->name}}</td>
                  <td><img src="images/partners/{{$partner->image}}" alt="partnerimg" class="imgpartner img-fluid"></td>
                  <td>
              {{--  edit --}}
                     <a class="btn v8 view-buttons" href="{{route('partners.edit',$partner->id)}}"> تعديل <iclass="icofont-edit"></i></a>
              {{--  show --}}
                  <a type="button"  class="btn v8 view-buttons show_button"  data-toggle="modal"data-target="#show"   href="{{route('partners.show',$partner->id)}}"> عرض <i class="icofont-eye-alt"></i></a>
              {{--  delete --}}
                  {{-- <button type="button" class="view-buttons btn v8 deleterow" data-partid="{{$partner->id}}" data-toggle="modal" data-target="#delete">حذف
                  <i class="icofont-ui-delete"></i>
                  </button>  --}}
                  </td>
              </tr>
              @endif
              @endforeach
              @endif
              @if(($count==0)||(!$partners))
              <tr>
                  <td colspan="6">
                      <div class="alert alert-info text-center" role="alert">
                        <h4 >عفوا لا يوجد نتائج لعرضها</h4>
                      </div>
                  </td>
              </tr>
              @endif
          </tbody>
      </table>
  </div>
  {{ $partners->links() }}
</div>
<!--end result table -->
  <!-- start deleteconfirmation Modal -->
       @include('front.partners.deletepartner')
       <!-- start show modal -->
       @include('front.partners.show_modal')

                              {{--  @endif--}}
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
