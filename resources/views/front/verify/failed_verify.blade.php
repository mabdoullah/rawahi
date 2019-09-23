@extends('front.master.app')

@section('content')
<!--Breadcrumb section starts-->
<div class="breadcrumb-section small-breadcrumb" >
    <div class="overlay op-5"></div>
    <div class="container">
        <div class="row align-items-center  pad-top-80">
            <div class=" col-12 text-center">
                <div class="breadcrumb-menu ">
                    <h3 class="page-title ">خطأ فى تفعيل البريد الإلكترونى   </h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Breadcrumb section ends-->
<!-- verify failed starts-->
<div class="list-details-section section-padding add_list pad-top-50">
    <div class="container">
        <div class="row">
            <div class="col-md-12">   
                <div class="tab-content mar-tb-30 add_list_content">                           
                    <div class="thank-page">
                        <div class="thank-cell">
                         <div class="tab-content mar-tb-30 add_list_content thankYou-page"> 
                             <div class="tab-pane fade show active" > 
                                <h4 class="text-center">                                                                                              
                                    <i class="ion-ios-information"></i>
                                    عفوًا     </h4>
                                <div class="row">
                                    <div class="col-md-12 text-center thank-message">
                                        <div class="form-group ">
                                            <label> خطأ فى تفعيل بريدك الإلكترونى 
                                                @if(!currentUser())
                                                <br>
                                                <br>
                                                من فضلك اضغط على الرابط المرسل لبريدك الإلكترونى
                                                <br>
                                                <br>
                                                أو
                                                <br>
                                                <br>
                                                قم بتسجيل الدخول <a class="text-primary" href="{{url('login')}}">من هنا</a>
                                                <br>
                                                <br>
                                                ثم قم بتعديل بريدك الإلكترونى بشكل صحيح
                                                @endif    
                                            </label>                                                                                                       
                                        </div>
                                        <i style="color:red" class="icofont-close"></i>
                                    </div>                                            
                                </div>
                            </div>                           
                         </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- verify failed ends-->


@endsection