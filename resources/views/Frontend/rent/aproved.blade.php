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
						<h4 class="">My rents</h4>
                   
            <?php $i=1 ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>car No</th>
                  <th>car Id</th>
                  <th>car Rent</th>
                  <th>Date</th>
                  <th>rent-a-car Name</th>
                  <th>rent-a-car contact</th>
                  <th>Aproval</th>
                </tr>
              </thead>
              <tbody>
              @foreach($aproved as $aproved)
                <tr>
                  <td>{{ $i++}}</td>
                  <td>{{$aproved->carId}}</td>
                  <td>{{$aproved->rent}}</td>
                  <td>{{$aproved->date}}</td>
                  <td>{{$aproved->rentName}}</td>
                  <td>{{$aproved->contact}}</td>
                  <td>{{$aproved->aproval}}</td>
            </a></td>
                  
                </tr>
                  @endforeach
              </tbody>

            </table>
					</div>
@endsection