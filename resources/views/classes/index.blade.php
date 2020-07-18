@extends('main')

@section('title','| كل الرسائل')

@section('content')
<div class="row">
	
<div class="col-md-5">
<a href=" {{ route('jobs.create')}} " class="btn btn-lg btn-block btn-primary">انشاء وظيفة جديدة</a>
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
				@foreach($jobs as $job)
				<tr> 
					<td>{{$job->id}}</td>
					<td>{{$job->name}}</td>
					<td>{{ date('M j,Y', strtotime($job->created_at)) }}</td>
					<td><a href="{{ route('jobs.show',$job->id)}}" class="btn btn-primary btn-sm">تفاصيل</a>  <a href="{{ route('jobs.edit',$job->id)}}" class="btn btn-primary btn-sm">تعديل</a> </td>


				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="text-center">
			{!! $jobs->links();  !!}
		</div>
	</div>
</div>


@stop