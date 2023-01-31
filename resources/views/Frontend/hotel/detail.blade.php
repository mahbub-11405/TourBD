@extends('Frontend.master')

@section('mainbody')

					<?php 
    foreach($hotel as $hotels){
      $hotelName=$hotels->hotelName;
       $hotelCategory=$hotels->hotelCategory;
       $contact=$hotels->contact;
       $address=$hotels->address;
      $description=$hotels->description;
      }

     ?>
<div class="container">
    <div class="row justify-content-center">
    	
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
        <div class="col-md-8">
        	
            <div class="card">
               

               <div class="thumbnail card-body text-center" style="
                  	margin-top: 65px;
                  	margin-left: 60px;">
                  			<h4 class="">Hotel Detail</h4>
                                     
                  <a href="{{url('/rooms/'.$hotels->hotelId)}}" class="btn btn-primary">view rooms</a> 
                  <div class="col-md-12">
                    <table class="table">
                      <tr>
                      <?php 
                      foreach($hotel as $hotels){ ?>
                        <td>
                        <img src="{{asset($hotels->imageName)}}" style="height: 247px; width: 200px;" alt=""></td>
                      <?php } ?>
                      </tr>
                    </table>
                    <a style="float: left" href="{{url('/hotel/rate/'.$hotels->hotelId)}}" class="btn btn-danger">rate this hotel</a><br><br>
                    <p>Hotel:
                    <h4>{{$hotelName}}</h4>  <h5>Category:{{$hotelCategory}}</h5> <br>
                    Contact No: <h5>{{$contact}}</h5><br>
                    Address <h5>{{$address}}</h5>
                  </p>
                    
                    Short description: <br>
                    <p>{{$description}}</p>

                  </div>
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection