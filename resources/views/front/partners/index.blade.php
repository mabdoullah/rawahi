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
                                        <tr>
                                          @foreach ($partners as $partner)


                                            <th scope="row">{{$partner->legal_name}}</th>
                                            <td>{{$partner->email}}</td>

                                            <td>{{$partner->phone}}</td>
                                            
                                            @endforeach
                                            <td><a class="btn v8 view-buttons" href="add-listing.html"> تعديل <i
                                                        class="icofont-edit"></i>
                                                </a>
                                                <button type="button" class="btn v8 view-buttons" data-toggle="modal"
                                                    data-target="#exampleModal"> عرض <i
                                                        class="icofont-eye-alt"></i></button>
                                                <button type="button" class="view-buttons btn v8 deleterow">حذف
                                                    <i class="icofont-ui-delete"></i> </button>
                                            </td>

                                        </tr>


                                    </tbody>
                                </table>
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
                                                                <div class="col-md-4">
                                                                    <div class="profile-img ">
                                                                        <img src="{{asset('front/images/profile.png')}}" alt="" />

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <label> الاسم الاول</label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p>سيبيسسيبيس </p>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label>البريد الالكتروني</label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p>kshitighelani@gmail.com</p>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label> الدوله </label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p>بيلبسسيب </p>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <label>رقم الجوال</label>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <p> يسبسيبيسبيسب</p>
                                                                        </div>

                                                                        <div class="col-md-6 col-12">
                                                                            <label>رقم الجوال</label>
                                                                        </div>
                                                                        <div class="col-md-6 col-12">
                                                                            <p> يسبسيبيسبيسب</p>
                                                                        </div>
                                                                    </div>

                                                                </div>



                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-3 col-12">
                                                                    <label>الدوله</label>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <p> بيلبسسيب</p>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <label>رقم الجوال</label>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <p> يسبسيبيسبيسب</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3 col-12">
                                                                    <label>رقم الجوال</label>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <p> يسبسيبيسبيسب</p>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <label>رقم الجوال</label>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <p> يسبسيبيسبيسب</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3 col-12">
                                                                    <label>المدينه </label>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <p> يسبسيبسبيسبب</p>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <label>رقم الجوال</label>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <p> يسبسيبيسبيسب</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3 col-12">
                                                                    <label>كلمه السر</label>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <p> بيليبل</p>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <label>رقم الجوال</label>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <p> يسبسيبيسبيسب</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3 col-12">
                                                                    <label>تاريخ الميلاد </label>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <p> اىللياي</p>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <label>رقم الجوال</label>
                                                                </div>
                                                                <div class="col-md-3 col-12">
                                                                    <p> يسبسيبيسبيسب</p>
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
