@extends('front.master.app')

@section('content')
<!--Breadcrumb section starts-->
<div class="breadcrumb-section small-breadcrumb" >
    <div class="overlay op-5"></div>
    <div class="container">
        <div class="row align-items-center  pad-top-80">
            <div class=" col-12 text-center">
                <div class="breadcrumb-menu ">
                    <h3 class="page-title "> تم تفعيل البريد الإلكترونى بنجاج </h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Breadcrumb section ends-->
    
    <!-- thank you starts-->
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
                                         شكرا لك </h4>
                                    <div class="row">
                                        <div class="col-md-12 text-center thank-message">
                                            <div class="form-group ">
                                                <label>   شكرا لك لاستخدام منصه رواهي لقد تمت عمليه التسجيل بنجاح, يمكنك الان الدخول على حسابك </label> 
                                                <i class="icofont-check-circled"></i>                                                                                                 
                                            </div>
                                            @if(!currentUser())
                                                <a class="btn v8 " href="{{url('login')}}"> تسجيل الدخول </a>    
                                            @endif
                                            
                                            <a class="btn v8 " href="registration-form.html">  الرئيسية </a>  
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
    <!-- thank you ends-->

@endsection