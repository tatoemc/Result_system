@extends('main')

@section('title','| كل الرسائل')

@section('content')
<div class="row">
  
<div class="col-md-8 col-md-offset-2">
   <img src="{{asset('logo-r.png') }}">
</div>
<div class="col-md-5 col-md-offset-4">
  <strong>مواد قسم : </strong>{{$dept->name}}
</div>
 
</div> 
   
<div class="row"> 
  
  <div class="col-md-10 col-md-offset-1"> 

    <table class="table"> 
    
      <tbody>   
           
          @foreach ($subjects as $item)
            <tr> <td width="100"><strong>{{$item->name}}</strong> </td><tr>
              <tr><td> 
                  @foreach ($item->subjects as $subject)
                   - {{ $subject->name}} 
                  @endforeach
              </td></tr>
          @endforeach
  
      </tbody>
    </table>

    <div class="text-center">
     
    </div>
   

  </div>
</div>
@stop