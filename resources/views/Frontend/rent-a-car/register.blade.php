@extends('Frontend.master')

@section('mainbody')
<div class="col-md-2"></div>
					<div class="col-md-8 bdr" style="overflow: hidden;"> 
						<div class="container">
							<h4 class="">Rent-a-car Registration</h4>
 						
					 <form class="form-group" method="POST" action="{{url('/Registration/rent') }}"  enctype="multipart/form-data">
  @csrf
						Rent-a-car Name: <input class="form-control" type="text" name="name"><br>
						Rent-a-car Email: <input class="form-control" type="text" name="email"><br>
						Rent-a-car Password: <input class="form-control" type="password" name="password"><br>
						Rent-a-car Location:	<select class="form-control" name="location" id="">
							@foreach($location as $locations)
							<option value="{{$locations->locationId}}">{{$locations->locationName}}</option>
							@endforeach
						</select>	<br>
						Rent-a-car Contact: <input class="form-control" type="text" name="contact"><br>
						Rent-a-car Image: <input class="form-control" type="file" name="image"><br>
						Rent-a-car Address: <textarea class="form-control" type="text" name="address"></textarea><br>
							<button  type="submit" class="btn btn-success">submit</button>
                    </form>
						</div>
						<div class="pagi"></div>
					</div>
<div class="col-md-2"></div>
@endsection