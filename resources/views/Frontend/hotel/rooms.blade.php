@extends('Frontend.master')

@section('mainbody')

					<div class="col-md-4 filter">
						<div class="filterH"><h3>Filter</h3>
						</div>
						<table class="table">
						<form action="">
							<tr>
								<td>স্থানঃ</td>
								<td>
									<input type="text">
								</td>
							</tr>
							<tr>
								<td>ভ্রমণ কারির সংখ্যাঃ</td>
								<td>
									<input type="text">
								</td>
							</tr>
							<tr>
								<td colspan="2"><button class=""><a href="">Search</a></button></td>
								
							</tr>
						</form>
						</table>
							
					</div>
<div class="col-md-8 bdr">
						<div class="container">
							<h4>rooms from all rooms</h4>

        @foreach($room as $rooms)
             
							<div class="row marginP">
								<div class="col-md-4">
									<img src="{{asset($rooms->imageName)}}" alt="">
								</div>
								<div class="col-md-6">
									<h4>{{$rooms->roomName}}</h4>
									<p>Capasity: {{$rooms->roomCapasity}} <br>
										category: {{$rooms->roomCategory}} <br>
										{{$rooms->description}}
									<br></p>
								</div>
								<div class="col-md-2"><h4>{{$rooms->roomRent}}. tk</h4>
									<a href="{{url('/room/view/'.$rooms->roomId)}}" class="btn btn-success">view room</a>
								</div>
							</div>
					@endforeach
						</div>
						<div class="pagi"></div>
					</div>
@endsection