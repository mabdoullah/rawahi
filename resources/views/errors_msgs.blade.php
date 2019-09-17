@if(!empty($errors) && !empty($errors->all()))
<div class="alert alert-danger alert-dismissible">
  
<ul>     
@foreach($errors->all() as $e)
    <li>{{$e}}</li>
@endforeach
</ul>
</div>
@endif

@if(session()->has('custom_error'))
<div class="alert alert-danger alert-dismissible">
    {{session('custom_error')}}
</div>    
@endif
