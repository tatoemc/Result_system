@extends('main')

@section('title','| كل الرسائل')

@section('content')
<div class="row"> 
	
<div class="col-md-5">
<a href=" {{ route('subjects.create')}} " class="btn btn-lg btn-block btn-primary">أضافة مادة</a>
</div>
<div class="col-md-5">

</div>
<div class="col-md-12">
<hr>
</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				
				<th>رقم المادة</th>
				<th>اسم المادة</th>
				<th>القسم</th>
				<th>الفصل الدراسي</th>
				<th>رمز المادة</th>
				<th>تاريخ الانشاء</th>
				<th></th>
 
			</thead>
			<tbody>
				@foreach($subjects as $subject)
				<tr> 
					<td>{{$subject->id}}</td>
					<td>{{$subject->name}}</td>
					<td>{{$subject->dept->name}}</td>
					<td>{{$subject->semester->name}}</td>
					<td>{{$subject->code}}</td>
					<td>{{ date('M j,Y', strtotime($subject->created_at)) }}</td>
					<td><a href="{{ route('subjects.show',$subject->id)}}" class="btn btn-primary btn-sm">تفاصيل</a>  <a href="{{ route('subjects.edit',$subject->id)}}" class="btn btn-primary btn-sm">تعديل</a> </td>


				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="text-center">
			{!! $subjects->links();  !!}
		</div>
	</div>
</div>


@stop