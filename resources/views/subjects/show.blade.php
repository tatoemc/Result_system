@extends('main')

@section('title','|عرض')

@section('content')
<div class="row">
	 <div class="col-md-8">
		
	<div class="portlet-body">
      <div class="table-responsive">
		    <table class="table table-bordered">
		        <thead >
		            
		        </thead>
		        <tbody> 
		            <tr>
		               <td > رقم المادة</td>
		                <td >{{ $subject->id }}</td> 
		            </tr>
		             <tr>
		               <td > اسم المادة</td>
		                <td >{{ $subject->name }}</td> 
		            </tr>
		            <tr>
		               <td > رمز المادة</td>
		                <td >{{ $subject->code }}</td> 
		            </tr>
		            <tr>
		               <td > اسم القسم</td>
		                <td >{{ $subject->dept->name }}</td> 
		            </tr>
		            <tr>
		               <td > اسم الفصل الدراسي</td>
		                <td >{{ $subject->semester->name }}</td> 
		            </tr>
		        </tbody>
		    </table>
		
	</div>
	<div class="col-md-4">
		<div class="well">
			
			<div class="row">
				<div class="col-sm-6">
					 {{ Html::linkRoute('subjects.edit','تعديل',array($subject->id),array('class'=>'btn btn-primary btn-block')) }}
					
                   
				</div>
				<div class="col-sm-6">
                      <!-- here is tow array !-->
					{!! Form::open(['route'=>['subjects.destroy', $subject->id], 'method'=>'DELETE' ] ) !!}
          
                      {!! Form::submit('حذف', ['class'=> 'btn btn-danger btn-block' ]) !!}
                      {!! Form::close() !!}
					
				</div>
				
			</div>
		</div>
	</div>
</div>


@endsection