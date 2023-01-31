@extends('Frontend.master')

@section('mainbody')
<div class="col-md-2"></div>
					<div class="col-md-8 bdr" style="overflow: hidden;"> 
						<div class="container">
							<h4 class="">Rent-a-car Registration</h4>
 						
					 <form class="form-group" method="POST" action="{{url('/Login/rent-a-car') }}"  enctype="multipart/form-data">
 			 @csrf
						
						Rent-a-car Email: <input class="form-control" type="text" name="email"><br>
						Rent-a-car Password: <input class="form-control" type="password" name="password"><br>
						
							<button  type="submit" class="btn btn-success">submit</button>
                    </form>
						</div>
						<div class="pagi"></div>
					</div>
<div class="col-md-2"></div>
@endsection