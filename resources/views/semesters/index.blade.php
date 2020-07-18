@extends('main')

@section('title','| كل الرسائل')

@section('content')
<div class="row">
	
<div class="col-md-5">
<a href=" {{ route('degrees.create')}} " class="btn btn-lg btn-block btn-primary">انشاء درجة وظيفية</a>
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
				
				<th>رقم الدرجة</th>
				<th>اسم الدرجة الوظيفية</th>
				<th>تاريخ الانشاء</th>
				<th></th>
 
			</thead>
			<tbody>
				@foreach($degrees as $degree)
				<tr> 
					<td>{{$degree->id}}</td>
					<td>{{$degree->name}}</td>
					<td>{{ date('M j,Y', strtotime($degree->created_at)) }}</td>
					<td><a href="{{ route('degrees.show',$degree->id)}}" class="btn btn-primary btn-sm">تفاصيل</a>  <a href="{{ route('degrees.edit',$degree->id)}}" class="btn btn-primary btn-sm">تعديل</a> </td>


				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="text-center">
			{!! $degrees->links();  !!}
		</div>
	</div>
</div>


@stop