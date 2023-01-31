@extends('Admin.master')

@section('mainbody')
     <?php 
    foreach($hotel as $hotels){
      $hotelName=$hotels->hotelName;
       $hotelCategory=$hotels->hotelCategory;
       $contact=$hotels->contact;
       $address=$hotels->address;
       $hotelId=$hotels->hotelId;
      }

     ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	
            <div class="card">
               

                <div class="thumbnail card-body text-center" style="
	margin-top: 65px;
	margin-left: 60px;">
			<h4 class="">Update Hotel</h4>
                    <form method="POST" action="{{url('/update/hotel') }}"  enctype="multipart/form-data">
               
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Hotel Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $hotelName }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Hotel Category') }}</label>

                            <div class="col-md-6">
                                <select name="category" id="">
                                    <option value="two star">two star</option>
                                    <option value="three star">three star</option>
                                    <option value="four star">four star</option>
                                    <option value="five star">five star</option>
                                </select>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Hotel Contact') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="contact" value="{{ $contact }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Hotel Address') }}</label>

                            <div class="col-md-6">
                                <textarea id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="address" value="{{ $address }}" required autofocus></textarea>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $hotelId }}">
                       
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