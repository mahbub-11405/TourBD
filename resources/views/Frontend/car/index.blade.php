@extends('Frontend.master')

@section('mainbody')
<div class="col-md-3">
	
						<div class="side-menu">
              <ul>
                <li>
            <a href="{{url('/car/add')}}">Add a car</a></li>
                <li>
            <a href="{{url('/car/table')}}">Car list</a></li>
                <li>
            <a href="{{url('/client/rent/requests')}}">Rent Request</a></li>
                <li>
            <a href="{{url('/my/Rents')}}">Rents</a></li>
              </ul>
            </div>
</div>
					<div class="col-md-8 bdr" style="overflow: hidden;"> 
						<div class="container">
							<h4 class="">Adding new Car</h4>
 						
					 <form class="form-group" method="POST" action="{{url('/adding/car') }}"  enctype="multipart/form-data">
  @csrf
						Car Name: <input class="form-control" type="text" name="name"><br>
						Car Category: <select name="category" id="">
							<option value="AC">AC</option>
							<option value="Non AC">Non AC</option>
						</select><br><br>
						
						Car Capasity: <input class="form-control" type="text" name="capasity"><br>
						Car Destination:	<select class="form-control" name="destination" id="">
							@foreach($location as $locations)
							<option value="{{$locations->locationName}}">{{$locations->locationName}}</option>
							@endforeach
						</select>	<br>
						Car Rent: <input class="form-control" type="text" name="rent"><br>
						Car Description: <textarea class="form-control" type="file" name="description"></textarea><br>
						Car Image: <input class="form-control" type="file" name="image1"><br>
						Car Image: <input class="form-control" type="file" name="image2"><br>
						Car Image: <input class="form-control" type="file" name="image3"><br>
							<button  type="submit" class="btn btn-success">submit</button>
					
                    </form>
						</div>
						<div class="pagi"></div>
					</div>
<div class="col-md-2"></div>
@endsection