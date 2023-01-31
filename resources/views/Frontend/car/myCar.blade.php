@extends('Frontend.master')

@section('mainbody')
		<?php 

		foreach($car as $cars){
				$carName=$cars->carName;
				$carCapasity=$cars->carCapasity;
				$carCategory=$cars->carCategory;
				$carRent=$cars->carRent;
				$carId=$cars->carId;
				$description=$cars->description;
				$carDestination=$cars->carDestination;
			}
		 ?>
		 <div class="col-md-1"></div>
					<div class="col-md-10 bdr" style="overflow: hidden;"> 
						<div class="container">
 							<h4 class="">View A Car</h4>
							
 						<div class="book text-center">
 							<a style="width: 100px;" href="{{url('/car/book/'.$carId)}}" class="btn btn-primary">book this car</a>
 						</div>
										
						  <table class="table">
						    <tr>
						    <?php 
						    foreach($car as $cars){ ?>
						      <td>
						      <img src="{{asset($cars->imageName)}}" style="height: 247px; width: 200px; " alt=""></td>
						    <?php } ?>
						    </tr>
						  </table>
						  <table class="table">
						  	<tr>
						  		<td>Car Name:</td>
						  		<td>{{$carName}}</td>
						  	</tr>
						  	<tr>
						  		<td>Category:</td>
						  		<td>{{$carCategory}}</td>
						  	</tr>
						  	<tr>
						  		<td>Capasity No:</td>
						  		<td>{{$carCapasity}}</td>
						  	</tr>
						  	<tr>
						  		<td>Rent:</td>
						  		<td>{{$carRent}}</td>
						  	</tr>
						  	<tr>
						  		<td>Destination:</td>
						  		<td>{{$carDestination}}</td>
						  	</tr>
						  </table>

						</div>
						</div>
						<div class="pagi"></div>
					</div>
		 <div class="col-md-1"></div>
@endsection