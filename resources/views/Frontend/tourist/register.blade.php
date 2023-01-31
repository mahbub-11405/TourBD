@extends('Frontend.master')

@section('mainbody')
<div class="col-md-2"></div>
					<div class="col-md-8 bdr" style="overflow: hidden;"> 
						<div class="container">
							<h4 class="">Tourist Registration</h4>
 						
					 <form class="form-group" method="POST" action="{{url('/Registration/tourist') }}"  enctype="multipart/form-data">
  @csrf
						Tourist Name: <input class="form-control" type="text" name="name"><br>
						Tourist Email: <input class="form-control" type="text" name="email"><br>
						Tourist Password: <input class="form-control" type="password" name="password"><br>
						
					Tourist Contact: <input class="form-control" type="text" name="contact"><br>
						Tourist Address: <textarea class="form-control" type="text" name="address"></textarea><br>
						Tourist Image: <input class="form-control" type="file" name="image"><br>
							<button  type="submit" class="btn btn-success">submit</button>
                    </form>
						</div>
						<div class="pagi"></div>
					</div>
<div class="col-md-2"></div>
@endsection