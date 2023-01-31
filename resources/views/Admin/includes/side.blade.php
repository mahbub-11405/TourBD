  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu</li>
        <li class="active treeview">
          <a href="{{url('/admin')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{url('/admin')}}"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="{{url('/admin')}}"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>
        <li><a href="{{url('/location/add')}}"><i class="fa fa-circle-o text-red"></i> <span>Add new Location</span></a></li>
        <li><a href="{{url('/location/table')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Locations Table</span></a></li><hr>
        <li><a href="{{url('/hotel/add')}}"><i class="fa fa-circle-o text-red"></i> <span>Add new Hotel</span></a></li>
        <li><a href="{{url('/hotel/table')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Hotels Table</span></a></li><hr>
        <li><a href="{{url('/room/add')}}"><i class="fa fa-circle-o text-red"></i> <span>Add new room</span></a></li>
        <li><a href="{{url('/room/table')}}"><i class="fa fa-circle-o text-aqua"></i> <span>Room table</span></a></li>
        <!-- <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Infor</span></a></li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>