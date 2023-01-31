@extends('Frontend.master')

@section('mainbody')
       <div class="col-md-12">
          <div class="form-group text-center">
            <h2>Top Locations</h2>
            <div class="clearfix"></div>
            <i class="tiltle-line"></i>
          </div>
        </div>
        @foreach($location as $locations)
                  <div class="col-md-4 featuredpost">
            <a href="{{url('/Rents/'.$locations->locationId)}}" target="_blank">
              <div class="featured hotel_loc_div">
                <div class="wow fadeIn hotel_loc_img animated" style="visibility: visible; animation-name: fadeIn;">
                    <div class="load img-container" style="min-height: 240px;">
                      <img class="img img-responsive" src="{{asset($locations->locationImage)}}" style="height: 240px;width: 100%">
                    </div>
                </div>
                <h3 class="hotel_location"><strong>{{$locations->locationName}}</strong></h3>
                <h4 class="hotels_num"><strong>Hotels available</strong></h4>
              <div style="margin-bottom:0px" class="clearfix"></div>
          </div>
              </a>
            </div>
            @endforeach
                        <div class="col-md-12">
              <hr>
            </div>
            
@endsection