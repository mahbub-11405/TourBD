@extends('Frontend.master')

@section('mainbody')


<?php 
foreach($req as $reqs){
    $rentalId=$reqs->rentalId;
       $carRent=$reqs->rent;
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
						<h4 class="">Edit Booking</h4>
           <div class="">

               <form class="form-group" method="POST" action="{{url('/edit/booking/car') }}"  enctype="multipart/form-data">
  @csrf
            Propose Rent: <input class="form-control" type="text" value="{{$carRent}}" name="rent"><br>
  <input type="hidden" value="{{$rentalId}}" name="id">
              <button  type="submit" class="btn btn-success">Update</button>
          
                    </form>

            </div>
       
					</div>
@endsection