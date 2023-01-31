@extends('Frontend.master')

@section('mainbody')
<?php 		  
foreach($hotel as $hotels){

$id=$hotels->locationId;
}
 ?>
					<div class="col-md-4 filter">
						<div class="filterH"><h3>Filter</h3>
						</div>
						<table class="table">
						<form action="{{url('/hotel/rent/search') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<tr>
								<td>প্রত্যহ ভাড়া</td>
								<td>
									<input style="color: black" type="text" placeholder="max rent" name="rent">
									<input type="hidden" placeholder="min rent" value="{{$id}}" name="id">
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
							<h4>Hotels from all Hotels</h4>
							

       
              @foreach($hotel as $hotels)
							<div class="row marginP">
								<div class="col-md-4">
									<img src="{{asset($hotels->imageName)}}" alt="">
								</div>
								    <div id="rating1" class="rating">
								    <?php 
								    if ($hotels->rate>5) {
								    	for($x = 1; $x <= 5; $x++){
								    		?>
								        <span style="color: yellow; font-size: 20px;">★</span>
								        <?php
								    }
								}
								else{
									for($x = 1; $x <= $hotels->rate; $x++){
								    		?>
								        <span style="color: yellow; font-size: 20px;">★</span>
								        <?php
								    	}
								}
								    	
								     ?>
								    </div>
								<div class="col-md-6">
									<h4>{{$hotels->hotelName}}</h4>
									<p>{{$hotels->address}} <br>
										{{$hotels->description}}
									<br></p>
								</div>
								<div class="col-md-2"><a href="{{url('/rooms/'.$hotels->hotelId)}}" class="btn btn-primary" style="margin-top: 9px;">view rooms</a> 
									<a href="{{url('/hotel/view/'.$hotels->hotelId)}}" class="btn btn-success">view hotel</a>
								</div>
							</div>
					@endforeach
						</div>
						<div class="pagi"></div>
					</div>
@endsection