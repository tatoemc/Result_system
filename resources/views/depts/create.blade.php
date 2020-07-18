@extends('main')

@section('title','| انشاء رسالة')

@section('content')

<div class="row"> 
	
		<div class="col-md-8 col-md-offset-2">
			        {!! Form::open(['route' => 'depts.store', 'data-parsley-validate' => '', 'files' => 'ture' ]) !!}
 
					{{form::label('')}}
					{{form::text('name',null,array('class' => 'form-control','required' => '','placeholder'=>'الاسم' )) }}
					{{form::text('description',null,array('class' => 'form-control','required' => '','placeholder'=>'الوصف' )) }}

					{{form::submit('انشاء مستخدم',array('class' => 'btn btn-success btn-lg btn-block','style'=>'margin-top: 20px'))}}

					{!! Form::close() !!}
		</div>
</div>

@endsection
