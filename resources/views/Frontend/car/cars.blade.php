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
							<h4>Cars from all Cars</h4>

        @foreach($car as $cars)
             
							<div class="row marginP">
								<div class="col-md-4">
									<img src="{{asset($cars->imageName)}}" alt="">
								</div>
								<div class="col-md-6">
									<h4>{{$cars->carName}}</h4>
									<p>Capasity: {{$cars->carCapasity}} <br>
										Category: {{$cars->carCategory}} <br>
										Destination: {{$cars->carDestination}} <br>
										{{$cars->description}}
									<br></p>
								</div>
								<div class="col-md-2"><h4>{{$cars->carRent}}. tk</h4>
									<a href="{{url('/myCar/'.$cars->carId)}}" class="btn btn-primary">Book now</a>
								</div>
							</div>
					@endforeach
						</div>
						<div class="pagi"></div>
					</div>
@endsection