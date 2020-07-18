@extends('main')

@section('title','| كل الرسائل')

@section('content')
<div class="row">
	
<div class="col-md-5">
<a href=" {{ route('depts.create')}} " class="btn btn-lg btn-block btn-primary">انشاء قسم جديد</a>
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
				
				<th>رقم القسم</th>
				<th>اسم القسم</th>
				<th>تاريخ الانشاء</th>
				<th></th>
 
			</thead>
			<tbody>
				@foreach($depts as $dept)
				<tr> 
					<td>{{$dept->id}}</td>
					<td>{{$dept->name}}</td>
					<td>{{ date('M j,Y', strtotime($dept->created_at)) }}</td>
					<td><a href="{{ route('depts.show',$dept->id)}}" class="btn btn-primary btn-sm">تفاصيل</a>  <a href="{{ route('depts.edit',$dept->id)}}" class="btn btn-primary btn-sm">تعديل</a> </td>


				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="text-center">
			{!! $depts->links();  !!}
		</div>
	</div>
</div>


@stop