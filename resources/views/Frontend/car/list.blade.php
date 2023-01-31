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
					<div class="col-md-9 bdr" style="overflow: hidden;"> 
						<h4 class="">Car list</h4>
                   
            <?php $i=1 ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>car No</th>
                  <th>car Name</th>
                  <th>car Category</th>
                  <th>car Capasity</th>
                  <th>car Rent</th>
                  <th>car Destination</th>
                  <th>view</th>
                  <th>edit</th>
                  <th>delete</th>
                </tr>
              </thead>
              <tbody>
              @foreach($car as $cars)
                <tr>
                  <td>{{ $i++}}</td>
                  <td>{{$cars->carName}}</td>
                  <td>{{$cars->carCategory}}</td>
                  <td>{{$cars->carCapasity}}</td>
                  <td>{{$cars->carRent}}</td>
                  <td>{{$cars->carDestination}}</td>
                  <td><a href="{{url('/view/car/'.$cars->carId)}}" class="btn btn-primary">
              <span class="">view </span>
            </a></td>
                  <td><a href="{{url('/edit/car/'.$cars->carId)}}" class="btn btn-success">
              <span class="">edit </span>
            </a></td>
                  <td><a href="{{url('/delete/car/'.$cars->carId)}}" class="btn btn-danger"> 
              <span class="">delte</span>
            </a></td>
                  
                </tr>
                  @endforeach
              </tbody>

            </table>
					</div>
            {{$car->links()}}
@endsection