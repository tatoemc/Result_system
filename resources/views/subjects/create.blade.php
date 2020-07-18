@extends('main')

@section('title','| انشاء رسالة')

@section('content')
<div class="row">
  
<div class="col-md-8 col-md-offset-2">
   <img src="{{asset('logo-r.png') }}">
</div>
<div class="col-md-5 col-md-offset-4">
  <strong>انشاء مادة : </strong>
</div>


<div class="row"> 
	
		<div class="col-md-8 col-md-offset-2">
			        {!! Form::open(['route' => 'subjects.store', 'data-parsley-validate' => '' ]) !!}
			        
					{{form::label('')}}
					{{form::text('name',null,array('class' => 'form-control','required' => '','placeholder'=>'الاسم' )) }} 

					{{form::label('')}}
					{{form::text('hours',null,array('class' => 'form-control','required' => '','placeholder'=>'عدد الساعات' )) }}

					{{form::label('dept_id', 'القسم:')}}
						<select class="form-control" name="dept_id">
			 				@foreach($depts as $dept)
	                         <option value='{{ $dept->id}}'> {{ $dept->name}}</option>
	                    	@endforeach
	                    </select> 

                    {{form::label('$semester_id', 'القسم:')}}
					<select class="form-control" name="semester_id">
						@foreach($semesters as $semester)
                         <option value='{{ $semester->id}}'> {{ $semester->name}}</option>
                    	@endforeach
                    </select> 

					{{form::submit('انشاء المادة',array('class' => 'btn btn-success btn-lg btn-block','style'=>'margin-top: 20px'))}}

					{!! Form::close() !!}
		</div>
</div>

@endsection
