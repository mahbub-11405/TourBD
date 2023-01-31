    <div class="header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <a href="{{url('/')}}" style="border: none;">
            <img src="{{asset('public/images/TourLogo.PNG')}}" alt=""></a>
            
              
              <?php 
              if($rentN=Session::get('rentCar')){
                foreach($rentN as $rentA){
                 $name= $rentA->rentName;
                 $rent= $rentA->rentId;
                }
               ?>

              
            <div class="dropdown">
              <button class=" dropdown-toggle dropbtn" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   {{$name}} 
                      
                    </button>
                    <ul class="dropdown-menu dropdown-content" aria-labelledby="dropdownMenu2">
                      <li><a href=""
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ url('/rent/logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>
                    </ul>
                       
            </div>
            <div class="dropdown">
                  <a href="{{url('/rent/profile/'.$rent)}}" class="btn btn-info btn-" style="margin-top: 19px;">
                    <span class="">Profile</span> 
                  </a>
              
            </div>

        <?php 
            }
                else if($tourist=Session::get('tourist')){
                  foreach($tourist as $tourists){
                 $name= $tourists->touristName;
                 $id= $tourists->touristId;
                }
         ?>
                   <div class="dropdown">
              <button class=" dropdown-toggle dropbtn" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   {{$name}} 
                      
                    </button>
                    <ul class="dropdown-menu dropdown-content" aria-labelledby="dropdownMenu2">
                      <li><a href=""
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ url('/tourist/logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>
                    </ul>
                       
            </div>
            <div class="dropdown">
                  <a href="{{url('/tourist/profile/'.$id)}}" class="btn btn-info btn-" style="margin-top: 19px;">
                    <span class="">Profile</span> 
                  </a>
              
            </div>
              
            <?php }

                  else{
             ?>
                       <div class="dropdown">
              <button class="dropdown-toggle  dropbtn" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Sign up
                      
                    </button>
                    <ul class="dropdown-menu dropdown-content" aria-labelledby="dropdownMenu2">
                      <li><a href="{{url('/tourist/register')}}">Tourist Signup</a></li>
                      <li><a href="{{url('/rent-a-car/register')}}">R.a.Car Signup</a></li>
                    </ul>
            </div>
            <div class="dropdown">
              <button class=" dropdown-toggle dropbtn" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Log in
                      
                    </button>
                    <ul class="dropdown-menu dropdown-content" aria-labelledby="dropdownMenu2">
                      <li><a href="{{url('/tourist/login')}}">Tourist Login</a></li>
                      <li><a href="{{url('/login/rent')}}">R.a.Car Login</a></li>
                    </ul>
              </div>         
              <?php } ?>
          </div>
        </div>
      </div>
    </div>