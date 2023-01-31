@extends('Frontend.master')

@section('mainbody')

					<div class="col-md-4 filter">
						<div class="filterH"><h3>Filter</h3>
						</div>
						<table class="table">
						<form action="{{url('/car/rent/search') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<tr>
								<td>প্রত্যহ ভাড়া</td>
								<td>
									<input style="color: black" type="text" placeholder="max rent" name="rent">
								</td>
							</tr>
							<tr>
								<td>ভ্রমনকারীর সংখ্যা</td>
								<td>
									<input style="color: black" type="text" placeholder="min tourist" name="tNo">
								</td>
							</tr>
							<tr>
								<td colspan="2"><button class="" type="submit">Search</button></td>
								
							</tr>
						</form>
						</table>
							
					</div>
<div class="col-md-8 bdr">
						<div class="container">
							<h4>Rent-A-Car</h4>

             @foreach($rent as $rents)
             
							<div class="row marginP">
								<div class="col-md-4">
									<img src="{{asset($rents->rentImage)}}" alt="">
								</div>
								<div class="col-md-6">
									<h4>Rent a car Name:{{$rents->rentName}}</h4>
									<p>Contact:{{$rents->contact}} <br>
										Email:{{$rents->rentEmail}} <br>	
										Address:{{$rents->address}}
									<br></p>
								</div>
								<div class="col-md-2"><a href="{{url('/cars/'.$rents->rentId)}}" class="btn btn-primary">view cars</a>
								</div>
							</div>
					@endforeach
					
						</div>
						<div class="pagi"></div>
					</div>
@endsection