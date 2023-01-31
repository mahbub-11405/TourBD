@extends('Admin.master')

@section('mainbody')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        	
            <div class="card">
               

                <div class="thumbnail card-body text-center" style="
	margin-top: 65px;
	margin-left: 60px;">
			<h4 class="">Room list</h4>
                   
            <?php $i=1 ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Hotel No</th>
                  <th>Room Name</th>
                  <th>Room Category</th>
                  <th>Room Rent</th>
                  <th>Room Capacity</th>
                  <th>view</th>
                  <th>edit</th>
                  <th>delete</th>
                </tr>
              </thead>
              <tbody>
              @foreach($room as $rooms)
                <tr>
                  <td>{{ $i++}}</td>
                  <td>{{$rooms->roomName}}</td>
                  <td>{{$rooms->roomCategory}}</td>
                  <td>{{$rooms->roomRent}}</td>
                  <td>{{$rooms->roomCapasity}}</td>
                  <td><a href="{{url('/view/room/'.$rooms->roomId)}}" class="btn btn-primary">
              <span class="glyphicon glyphicon-edit">view </span>
            </a></td>
                  <td><a href="{{url('/edit/room/'.$rooms->roomId)}}" class="btn btn-success">
              <span class="glyphicon glyphicon-edit">edit </span>
            </a></td>
                  <td><a href="{{url('/delete/room/'.$rooms->roomId)}}" class="btn btn-danger"> 
              <span class="glyphicon glyphicon-edit">delte</span>
            </a></td>
                  
                </tr>
                  @endforeach
              </tbody>

            </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection