@extends('main')

@section('title','| انشاء رسالة')

@section('content')  

<div class="row"> 
      <div class="col-md-8 col-md-offset-2">
       <img src="{{asset('logo-r.png') }}">
       <div class="alert alert-success" role="alert"> أدخال نتيجة الملحق : </div>
      </div>

	 <div class="col-md-8 col-md-offset-2">
		{!! Form::open(['route' => 'appendices.selectAppendicesResult', 'data-parsley-validate' => '','method'=>'POST','enctype'=>'multipart/form-data' ]) !!}
         {{csrf_field()}}
         {{ method_field('get') }}
        <label for="اسم القسم">العام الدراسي</label>
        <select class="form-control" name="year">
           <option value="">اختار العام الدراسي</option> 
            @foreach ($years as $year)                    
                <option value="{{ $year->id }}">{{ $year->year}}</option>
            @endforeach
         </select>
         <label for="اسم القسم">اسم القسم</label>
         <select class="form-control" name="dept" id="dept" > 
                 <option>اختيار القسم</option>
		        @foreach ($depts as $key => $value)
		            <option value="{{ $key }}" >{{ $value }}</option>
		        @endforeach
         </select>
         <label for="اسم القسم"> الفصل الدراسي</label>
         <select class="form-control" name="semester_id" id="semester_id"> 
		        @foreach ($semesters as $semester)                   
		            <option value="{{ $semester->id }}">{{ $semester->name}}</option>
		        @endforeach
         </select>
        <label for="اسم القسم"> المستوى</label>
        <select class="form-control" name="grade_id"> 
		        @foreach ($grades as $grade)                   
		            <option value="{{ $grade->id }}">{{ $grade->name}}</option>
		        @endforeach
         </select>
         <label for="اسم القسم"> المادة</label>
         <select class="form-control" name="subject" id="subject"> 
		       
         </select>
         
         {{form::submit('ادخال',array('class' => 'btn btn-success btn-lg btn-block','style'=>'margin-top: 20px'))}}

		 {!! Form::close() !!}
	</div>
</div>

@endsection

@section('scripts')

	<script>
	 
	$(document).ready(function(){

	      $('select[name="dept"]').on('change',function(){

          var dept_id = $(this).val();
         
          if(dept_id) {

          	$.ajax({
          		url:'/getdepts/'+dept_id+semester_id,
          		type: 'GET',
          		dataType: 'json',
          		success: function(data){
          			console.log(data);
          			$('select[name="subject"]').empty();
          			$.each(data,function(key,value){
          				$('select[name="subject"]')
          				.append('<option value="'+key+'">'+ value + '</option>');
          			});
          		}

          	});

          } else{
          	$('select[name="subject"]').empty();
          }

	      });
		});

	</script>

 @endsection
