@extends('Frontend.master')

@section('mainbody')


<?php 
foreach($car as $cars){
    $carId=$cars->carId;
      $carName=$cars->carName;
       $carCategory=$cars->carCategory;
       $carCapasity=$cars->carCapasity;
       $carRent=$cars->carRent;
      $destination=$cars->carDestination;
      $description=$cars->description;
      $rentId=$cars->rentId;
}
 ?>
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
					<div class="col-md-9 bdr" style="overflow: hidden;"> 
						<h4 class="">Car Booking</h4>
           <div class="">

               <form class="form-group" method="POST" action="{{url('/booking/car') }}"  enctype="multipart/form-data">
  @csrf
            Car Name: {{$carName}} <br>
            Car Category: {{$carCategory}} <br>
            
            Car Capasity: {{$carCapasity}} <br>
            Car Destination:  {{$destination}} <br>
            Propose Rent: <input class="form-control" type="text" value="{{$carRent}}" name="rent"><br>
  <input type="hidden" value="{{$carId}}" name="id">
  <input type="hidden" value="{{$rentId}}" name="rentId">
              <button  type="submit" class="btn btn-success">Book</button>
          
                    </form>

            </div>
       
					</div>
@endsection