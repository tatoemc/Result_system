@extends('main')

@section('title','|تعديل')

@section('content')
<div class="row"> 
	<!-- to array here !-->  
	 
	 <div class="col-md-7">
	 	{!! Form::model($subject, ['route'=>['subjects.update',$subject->id] ,'method' => 'PUT']) !!}

	 	{{form::label('name', 'الاسم المادة :')}}
		{{ form::text('name', null , ["class"=>'form-control input-lg' ]) }}

		{{form::label('code', 'رمز المادة :')}}
		{{ form::text('code', null , ["class"=>'form-control input-lg' ]) }}

		{{form::label('dept_id', 'القسم:')}}
		<select class="form-control" name="dept_id">
			@foreach($depts as $dept)
             <option value='{{ $dept->id}}'{{$dept->id == $subject->dept_id ? 'selected' : '' }}> {{ $dept->name}}</option>
        	@endforeach
        </select>
        {{form::label('semester_id', 'القسم:')}}
		<select class="form-control" name="semester_id">
			@foreach($semesters as $semester)
             <option value='{{ $semester->id}}'{{$semester->id == $subject->semester_id ? 'selected' : '' }}> {{ $semester->name}}</option>
        	@endforeach
        </select>

		
	</div>
	<div class="col-md-5">
		<div class="well">
			<dl class="dl-horizontal">
			<dt> Create at: </dt>
			<dd> {{ date( 'M j, h:ia', strtotime($subject->created_at)) }} </dd>
			</dl>

			<dl class="dl-horizontal">
			<dt> update at </dt>
			<dd> {{ date( 'M j, h:ia', strtotime($subject->updated_at)) }} </dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					 {{ Html::linkRoute('subjects.show','الغاء',array($subject->id),array('class'=>'btn btn-danger btn-block')) }}
                   
				</div>
				<div class="col-sm-6">
                      {{ Form::submit('حفظ', ['class'=>'btn btn-success btn-block'] )}}
				</div><!-- end form !-->
                 
			</div>
		</div>
	</div>

{!! Form::close() !!}
</div> <!-- end the form !-->

@endsection

