@extends('Admin.master')

@section('mainbody')<?php 
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
        <div class="col-md-10">
        	
            <div class="card">
               

                <div class="thumbnail card-body text-center" style="
	margin-top: 65px;
	margin-left: 60px;">
			<h4 class="">Hotel Detail</h4>
                   

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