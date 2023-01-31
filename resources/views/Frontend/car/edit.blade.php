@extends('Frontend.master')

@section('mainbody')
		<?php 

		foreach($car as $cars){
				$carName=$cars->carName;
				$carCapasity=$cars->carCapasity;
				$carRent=$cars->carRent;
				$carId=$cars->carId;
			}
		 ?>
<div class="col-md-3">
	
						<div class="side-menu">
							<ul>
								<li>
						<a href="{{url('/car/add')}}">Add a car</a></li>
								<li>
						<a href="{{url('/car/table')}}">Car list</a></li>
								<li>
						<a href="{{url('/rent/request')}}">Rent Request</a></li>
								<li>
						<a href="{{url('/my/Rents')}}">Rents</a></li>
							</ul>
						</div>
</div>
					<div class="col-md-8 bdr" style="overflow: hidden;"> 
						<div class="container">
							<h4 class="">Adding new Car</h4>
 						
					 <form class="form-group" method="POST" action="{{url('/updating/car') }}"  enctype="multipart/form-data">
  @csrf
						Car Name: <input class="form-control" value="{{$carName}}" type="text" name="name"><br>
						Car Category: <select name="category" id="">
							<option value="AC">AC</option>
							<option value="Non AC">Non AC</option>
						</select><br><br>
						
						Car Capasity: <input class="form-control" type="text" value="{{$carCapasity}}" name="capasity"><br>
						</select>	<br>
						Car Rent: <input class="form-control" value="{{$carRent}}" type="text" name="rent"><br>
						Car Image: <input class="form-control" type="file" name="image1"><br>
						Car Image: <input class="form-control" type="file" name="image2"><br>
						Car Image: <input class="form-control" type="file" name="image3"><br>
						<input type="hidden" value="{{$carId}}" name="id">
							<button  type="submit" class="btn btn-success">submit</button>
					
                    </form>
						</div>
						<div class="pagi"></div>
					</div>
<div class="col-md-2"></div>
@endsection