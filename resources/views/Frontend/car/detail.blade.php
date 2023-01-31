@extends('Frontend.master')

@section('mainbody')


<?php 
foreach($car as $cars){
      $carName=$cars->carName;
       $carCategory=$cars->carCategory;
       $carCapasity=$cars->carCapasity;
       $carRent=$cars->carRent;
      $destination=$cars->carDestination;
      $description=$cars->description;
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
					<div class="col-md-9 bdr" style="overflow: hidden;"> 
						<h4 class="">Car Details</h4>
                   
                
                   

            <div class="">
              <table class="table">
                <tr>
                <?php 
                foreach($car as $cars){ ?>
                  <td>
                  <img src="{{asset($cars->imageName)}}" style="height: 247px; width: 200px;" alt=""></td>
                <?php } ?>
                </tr>
              </table>
              <p>Car:
              <h4>{{$carName}}</h4>  <h5>Category:{{$carCategory}}</h5> <br>
              Capasity No: <h5>{{$carCapasity}}</h5><br>
              Rent <h5>{{$carRent}}</h5>
              Destination <h5>{{$destination}}</h5>
            </p>
              
              Short description: <br>
              <p>{{$description}}</p>

            </div>
       
					</div>
@endsection