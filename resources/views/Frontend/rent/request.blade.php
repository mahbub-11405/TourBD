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
            <h4 class="">Request for Car</h4>
                   
            <?php $i=1 ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>car No</th>
                  <th>car Id</th>
                  <th>car Rent</th>
                  <th>Date</th>
                  <th>rent Name</th>
                  <th colspan="3">Aproval</th>
                </tr>
              </thead>
              <tbody>
              @foreach($request as $request)
                <tr>
                  <td>{{ $i++}}</td>
                  <td>{{$request->carId}}</td>
                  <td>{{$request->rent}}</td>
                  <td>{{$request->date}}</td>
                  <td>{{$request->rentName}}</td>
                  @if($request->aproval=='requested')
                  <td><a href="{{url('/Accept/rent/'.$request->rentalId)}}" class="btn btn-success">
              <span class="">Accept</span>
            </a></td>
                  <td><a href="{{url('/deny/rent/'.$request->rentalId)}}" class="btn btn-danger"> 
              <span class="">Deny</span>
            </a></td>
              
                      @elseif($request->aproval=='accepted')
                  <td><a href="#" class="btn btn-primary">
              <span class="">Accepted</span>
            </a></td>
                  <td><a href="{{url('/deny/rent/'.$request->rentalId)}}" class="btn btn-danger"> 
              <span class="">Deny</span>
            </a></td>
                      @else($request->aproval=='denied')
                  <td><a href="{{url('/Accept/rent/'.$request->rentalId)}}" class="btn btn-success">
              <span class="">Accept</span>
            </a></td>
                  <td><a href="#" class="btn btn-primary"> 
              <span class="">Denied</span>
            </a></td>
            @endif
                  
                </tr>
                  @endforeach
              </tbody>

            </table>
          </div>
@endsection