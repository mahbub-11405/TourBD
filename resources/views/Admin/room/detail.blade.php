@extends('Admin.master')

@section('mainbody')<?php 
    foreach($room as $rooms){
      $roomName=$rooms->roomName;
       $roomCategory=$rooms->roomCategory;
       $roomRent=$rooms->roomRent;
       $roomCapasity=$rooms->roomCapasity;
      $description=$rooms->description;
      }

     ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        	
            <div class="card">
               

                <div class="thumbnail card-body text-center" style="
	margin-top: 65px;
	margin-left: 60px;">
			<h4 class="">Room Detail</h4>
                   

<div class="col-md-12">
  <table class="table">
    <tr>
    <?php 
    foreach($room as $rooms){ ?>
      <td>
      <img src="{{asset($rooms->imageName)}}" style="height: 247px; width: 200px;" alt=""></td>
    <?php } ?>
    </tr>
  </table>
  <p>Room:
  <h4>{{$roomName}}</h4>  <h5>Category:{{$roomCategory}}</h5> <br>
  Room rent: <h5>{{$roomRent}}</h5><br>
  Capasity of this room <h5>{{$roomCapasity}}</h5>
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
