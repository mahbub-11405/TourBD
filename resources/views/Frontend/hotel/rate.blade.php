@extends('Frontend.master')

@section('mainbody')

					<?php 
    foreach($hotel as $hotels){
      $hotelName=$hotels->hotelName;
       $hotelCategory=$hotels->hotelCategory;
       $hId=$hotels->hotelId;
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
               

               <div class="thumbnail card-body" style="
                  	margin-top: 65px;
                  	margin-left: 60px;">
                  			<h4 class="">Hotel rating</h4>

                   <p>
                    <h4>Hotel:{{$hotelName}}</h4>  
                    <h5>Category:{{$hotelCategory}}</h5>
                    <h5>ID: </h5><br>
                  </p>
                                      
                  <div class="col-md-12">
                    <br><br>
                    <form class="form-group" method="POST" action="{{url('/hotel/rating') }}"  enctype="multipart/form-data">
                   @csrf
                        
                        Rate: <input placeholder="max 5" class="form-control" type="text" name="rate"><br>
                        Heading: <input class="form-control" type="text" name="head"><br>
                        Say something: <textarea class="form-control" type="text" name="description"></textarea> <br>
                        <input  type="hidden" value="{{$hId}}" name="hID">
                          <button  type="submit" class="btn btn-success">submit</button>
                      </form>

                  </div>
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection