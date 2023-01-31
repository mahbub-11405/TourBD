@extends('Frontend.master')

@section('mainbody')
<div class="col-md-3">
	
						<div class="side-menu">
							<ul>
								<li>
						<a href="{{url('/car/add')}}">Add a car</a></li>
								<li>
						<a href="{{url('/car/table')}}">Car list</a></li>
								<li>
						<a href="{{url('/client/rent/requests')}}">Rent Request</a></li>
								<li>
						<a href="{{url('/my/Rents')}}">Rents</a></li>
							</ul>
						</div>
</div>
<div class="col-md-9">
	<table class="table pro-img" >
		@foreach($rent as $rents)
		<tr>
			<img src="{{asset($rents->rentImage)}}" style="height: 247px; width: 250px;margin-left: 458px;}" alt="">
		</tr>
		<tr>
			<td>Name</td>
			<td>{{ $rents->rentName }}</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>{{ $rents->rentEmail }}</td>
		</tr>
		<tr>
			<td>Address</td>
			<td>{{ $rents->address }}</td>
		</tr>
		<tr>
			<td>Moblie</td>
			<td>{{ $rents->contact }}</td>
		</tr>
		<tr>
			<td></td>
			<td><a href="{{url('')}}" class="btn btn-success btn-" style="margin-left: 400px;" >Edit Profile</a></td>
		</tr>
		@endforeach
	</table>
</div>

@endsection