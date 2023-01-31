@extends('Frontend.master')

@section('mainbody')
<div class="col-md-2"></div>
					<div class="col-md-8 bdr" style="overflow: hidden;"> 
						<div class="container">
							<h4 class="">Tourist Registration</h4>
 						@foreach($tourist as $tourist)
					 <form class="form-group" method="POST" action="{{url('/update/tourist') }}"  enctype="multipart/form-data">
  @csrf
						Tourist Name: <input class="form-control" type="text" value="{{ $tourist->touristName }}" name="name"><br>
						Tourist Email: <input class="form-control" type="text" value="{{ $tourist->touristEmail }}" name="email"><br>
						Tourist Password: <input class="form-control" type="password" name="password"><br>
						
					Tourist Contact: <input class="form-control" value="{{ $tourist->contact}}" type="text" name="contact"><br>
						Tourist Address: <textarea class="form-control" type="text" name="address"></textarea><br>
						Tourist Image: <input class="form-control" type="file" name="image"><br>
						<input type="hidden" value="{{$tourist->touristId}}" name="id">
							<button  type="submit" class="btn btn-success">submit</button>
                    </form>
                    @endforeach
						</div>
						<div class="pagi"></div>
					</div>
<div class="col-md-2"></div>
@endsection

