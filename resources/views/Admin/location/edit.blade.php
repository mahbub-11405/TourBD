@extends('Admin.master')

@section('mainbody')
<?php 
foreach ($location as $locations) {
    $name=$locations->locationName;
    $image=$locations->locationImage;
    # code...
}
 ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	
            <div class="card">
               

                <div class="thumbnail card-body text-center" style="
	margin-top: 65px;
	margin-left: 60px;">
			<h4 class="">Edit Location</h4>
                    <form method="POST" action="{{url('/updating/location') }}"  enctype="multipart/form-data">
               
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Location Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="location" value="{{$name}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Location Image') }}</label>

                            <div class="col-md-6">
                                <input id="img" type="file" accept="image/*" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="image" value="{{ $image }}" required autofocus>
                                        
                                @if ($errors->has('img'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('img') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Previous Location Image') }}</label>

                            <div class="col-md-6">
    <img src="{{asset($image)}}" alt="" style="height: 100px; width: 100px;">
                                    
                            </div>
                        </div>
                       <input id="name" type="hidden" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="id" value="{{$locations->locationId}}" required autofocus>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection