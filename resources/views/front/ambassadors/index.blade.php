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
                       <div class="view-page tab-content mar-tb-30 add_list_content">

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
                            {{--   @if(!count($ambassdors))
                               <div class="alert alert-info text-center" role="alert">
                                 <h4 >عفوا لا يوجد سفراء لعرضها</h4>
                                </div>
                               @else--}}
                               <div class="filter-wrapper style1 v2 ">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12 pad-top-30 pad-bot-30">
                                                <form action="{{route('ambassadors.index')}}" id="searchForm" method="get" class="hero__form v2 filter">
                                                     <div class="row">
                                                         <div class="col-lg-4 col-md-12">
                                                             <input type="text" id='search_name' name='search_name'placeholder="بحث بالأسم" value="{{ old('search_name') ?? $searchByName ?? null }}" class="hero__form-input custom-select">
                                                         </div>
                                                         <div class="col-lg-3 col-md-12">
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
                                                         <div class="col-lg-2 col-md-12 text-center">
                                                             <button type="submit" name="" class="btn  v3" >بحث</button>
                                                         </div>
                                                      </div>
                                                </form>
                                             </div>
                                        </div>
                                     </div>
                               </div>
                               <div class="over-flo">
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
                                                @if($ambassdors)
                                                @php $count=0;@endphp
                                                @foreach($ambassdors as $ambassador)
                                                @if($ambassador->citydata)
                                                @php   $count=$count+1; @endphp
                                                <tr>
                                                    <td>{{$ambassador->first_name}}</td>
                                                    <td>{{$ambassador->email}}</td>
                                                    <td>{{$ambassador->phone}}</td>
                                                    <td>{{$ambassador->citydata->name}}</td>
                                                    <td>
                                                        <!-- edit -->
                                                        <a class="btn v8 view-buttons"  href="{{route('ambassadors.edit',$ambassador->id)}}"> تعديل <i class="icofont-edit"></i></a>
                                                        <!-- show -->
                                                        <a type="button"  data-showambassid ="{{$ambassador->id}}" class="btn v8 view-buttons show_button"  data-toggle="modal"data-target="#exampleModal"   href="{{route('ambassadors.show',$ambassador->id)}}"> عرض <i class="icofont-eye-alt"></i></a>
                                                            <!-- delete -->
                                                        {{--<button  class="v8 btn view-buttons" data-toggle="modal" data-ambassadorid="{{$ambassador->id}}" data-target="#DeleteModal" > حذف<i class="icofont-ui-delete"></i></button>--}}
                                                    </td>

                                                </tr>
                                                @endif
                                                @endforeach
                                                @endif
                                                @if(($count==0)||(!$ambassdors))
                                                <tr>
                                                    <td colspan="5">
                                                        <div class="alert alert-info text-center" role="alert">
                                                        <h4 >عفوا لا يوجد نتائج لعرضها</h4>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                </div>
                               {{ $ambassdors->links() }}
                             </div>
                            {{--   @endif--}}
                              @include('front.ambassadors.delete_modal')
                              @include('front.ambassadors.show_modal')
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
    var id= $(this).data('showambassid');
    $.ajax({
        dataType: 'json',
        type:'GET',
        url: show_action,
        data:{id:id},
        success: function(response){
      // Add response in Modal body
      console.log(response);
      $('#myTabContent').find('p').empty();
      $('#show_first_name').append(response['first_name']);
      $('#show_second_name').append(response['second_name']);
      $('#show_email').append(response['email']);
      $('#show_phone').append(response['phone']);
      $('#show_phone_key').append(response['phone_key']);
      $('#show_city').append(response['citydata']['name']);
      $('#generate_id').append(response['generate_id']);
      $('#show_birth_date').append(response['birth_date']);
  }
  });
});
</script>
<script type="text/javascript">
  $('#DeleteModal').on('show.bs.modal', function (e) {
      var button = $(e.relatedTarget);
    var ambassador_id=button.data('ambassadorid');
    var modal=$(this);
    modal.find('.modal-body #delete_id').val(ambassador_id);
  });
  function formSubmit()
      {
          $("#deleteForm").submit();
      }
</script>
@endpush
