@extends('Admin.master')

@section('mainbody')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        	
            <div class="card">
               

                <div class="thumbnail card-body text-center" style="
	margin-top: 65px;
	margin-left: 60px;">
			<h4 class="">Location list</h4>
                   
            <?php $i=1 ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Location No</th>
                  <th>Location Name</th>
                  <th>Location Image</th>
                  <th>edit</th>
                  <th>delete</th>
                </tr>
              </thead>
              <tbody>
              @foreach($location as $locations)
                <tr>
                  <td>{{ $i++}}</td>
                  <td>{{$locations->locationName}}</td>
                  <td><img src="{{asset($locations->locationImage)}}" style="height: 100px;
                  width: 100px;" alt=""></td>
                  <td><a href="{{url('/edit/location/'.$locations->locationId)}}" class="btn btn-success">
              <span class="glyphicon glyphicon-edit">edit </span>
            </a></td>
                  <td><a href="{{url('/delete/location/'.$locations->locationId)}}" class="btn btn-danger"> 
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