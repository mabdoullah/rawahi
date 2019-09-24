<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Metas -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="LionCoders" />

    <!-- Document Title -->
    <title>email verification</title>
    <style>
        body,
        html {
            margin: 0;
            height: 100vh;
            display: grid;
            background-color: rgb(255, 255, 255); 
            direction: rtl;
            color: #333333;
        }

        section {
            width: 90%;
            margin: auto;
            border: 1px #FFAB0B solid;
            padding: 20px 15px;
            border-radius: 5px;
        }

        img {
            max-width: 200px;
            max-height: 200px;
        }

        .center {
            text-align: center;
        }

        .mr-bt-50 {
            margin-bottom: 50px;
        }

        .mr-bt-40 {
            margin-bottom: 40px;
        }
    
        .mr-bt-20{
            margin-bottom: 20px;
        }
        
        .verify:hover {
            color: yellow;
            border: 1px yellow solid;
        }

        .verify {
            background-color: #FFAB0B;
            text-decoration: none;
            padding: 10px 25px;
            color: #333333;
            border-radius: 10px;
            font-size: 1.5em;
            
        }

        .element{
            overflow: auto;
            width: 100%;
            display: block;
        }

        hr{
            color: #ddd; 
            font-size: 1px;
        }

        h1{
            font-size:2em;
        }

        .lineheight{
            line-height: 150%;
        }

        h3{
            font-weight: 300;
            font-size: 1.3em;
        }

        .overflow-hide{
            overflow-x: hidden;
        }

    </style>
</head>

<body>
    <section>
        <div class="center mr-bt-20 overflow-hide">
            <img src="{{asset('front/images/emails/email-logo.png')}}" alt="logo">
        </div>
        <hr class="center">
        <div class="center">
            <h1 class="mr-bt-50"> مرحبا {{$user->first_name}}</h1>
        </div>
        <h3 class="mr-bt-40 center"> قبل أن نتمكن من إكمال طلبك ، نحتاج إلى التحقق من صحة عنوان بريدك الإلكتروني لذا من فضلك انقر الزر في الاسفل : </h3>
        <div class="center mr-bt-40 ">
            <a class="verify" href="{{url('user/verify', $user->verifyUser->token)}}">تاكيد البريد الالكتروني</a>
        </div>
    </section>
</body>

</html>