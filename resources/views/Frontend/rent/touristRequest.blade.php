
@extends('Frontend.master')

@section('mainbody')

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
            <h4 class="">Request for Car</h4>
                   
            <?php $i=1 ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>car No</th>
                  <th>car Id</th>
                  <th>car Rent</th>
                  <th>Date</th>
                  <th>Aproval</th>
                  <th>edit</th>
                  <th>delete</th>
                </tr>
              </thead>
              <tbody>
              @foreach($request as $request)
                <tr>
                  <td>{{ $i++}}</td>
                  <td>{{$request->carId}}</td>
                  <td>{{$request->rent}}</td>
                  <td>{{$request->date}}</td>
                  <td>{{$request->aproval}}</td>
                  <td><a href="{{url('/edit/request/'.$request->rentalId)}}" class="btn btn-success">
              <span class="">edit</span>
            </a></td>
                  <td><a href="{{url('/delete/request/'.$request->rentalId)}}" class="btn btn-danger"> 
              <span class="">delte</span>
            </a></td>
                  
                </tr>
                  @endforeach
              </tbody>

            </table>
          </div>
@endsection