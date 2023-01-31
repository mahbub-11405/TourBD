@extends('Frontend.master')

@section('mainbody')
<div class="col-md-3">
  
            <div class="side-menu">
              <ul>
                <li>
            <a href="{{url('/rent/Requests')}}">My rent Requests</a></li>
                <li>
            <a href="{{url('/rent/table')}}">Rent Table</a></li>
              </ul>
            </div>
</div>
<div class="col-md-9">
	<table class="table pro-img" >
		@foreach($tourist as $tourist)
		<tr>
			<img src="{{asset($tourist->touristImage)}}" style="height: 247px; width: 250px;margin-left: 458px;}" alt="">
		</tr>
		<tr>
			<td>Name</td>
			<td>{{ $tourist->touristName }}</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>{{ $tourist->touristEmail }}</td>
		</tr>
		<tr>
			<td>Address</td>
			<td>{{ $tourist->address }}</td>
		</tr>
		<tr>
			<td>Moblie</td>
			<td>{{ $tourist->contact }}</td>
		</tr>
		<tr>
			<td></td>
			<td><a href="{{url('/edit/tourist/profile/'.$tourist->touristId)}}" class="btn btn-success btn-" style="margin-left: 400px;" >Edit Profile</a></td>
		</tr>
		@endforeach
	</table>
</div>

@endsection