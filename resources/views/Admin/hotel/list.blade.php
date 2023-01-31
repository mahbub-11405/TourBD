@extends('Admin.master')

@section('mainbody')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        	
            <div class="card">
               

                <div class="thumbnail card-body text-center" style="
	margin-top: 65px;
	margin-left: 60px;">
			<h4 class="">Hotel list</h4>
                   
            <?php $i=1 ?>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Hotel No</th>
                  <th>Hotel Name</th>
                  <th>Hotel Category</th>
                  <th>Hotel contact</th>
                  <th>Hotel address</th>
                  <th>view</th>
                  <th>edit</th>
                  <th>delete</th>
                </tr>
              </thead>
              <tbody>
              @foreach($hotel as $hotels)
                <tr>
                  <td>{{ $i++}}</td>
                  <td>{{$hotels->hotelName}}</td>
                  <td>{{$hotels->hotelCategory}}</td>
                  <td>{{$hotels->contact}}</td>
                  <td>{{$hotels->address}}</td>
                  <td><a href="{{url('/view/hotel/'.$hotels->hotelId)}}" class="btn btn-primary">
              <span class="glyphicon glyphicon-edit">view </span>
            </a></td>
                  <td><a href="{{url('/edit/hotel/'.$hotels->hotelId)}}" class="btn btn-success">
              <span class="glyphicon glyphicon-edit">edit </span>
            </a></td>
                  <td><a href="{{url('/delete/hotel/'.$hotels->hotelId)}}" class="btn btn-danger"> 
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