  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <!-- <img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image"> -->
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
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

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="/"><i class="nav-icon fa fa-edit text-warning"></i><span>Dashboard</span></a></li>
        <li><a href="{{ url('employee-management') }}"><i class="nav-icon fa fa-tree text-warning"></i><span>Task Progress</span></a></li>
        <li class="treeview">
          <a href="#"><i class="nav-icon fa fa-th text-warning"></i><span>System Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>  
          <ul class="treeview-menu">
            @if(Auth::user()->role_name == 'MSA')
                <li><a href="{{ url('system-management/company') }}"><i class="nav-icon fa fa-circle text-info"></i>CRUD Company</a></li>
                <li><a href="{{ url('system-management/role') }}"><i class="nav-icon fa fa-circle text-info"></i>CRUD Role</a></li>
            @endif
            <li><a href="{{ url('system-management/project') }}"><i class="nav-icon fa fa-circle text-info"></i>CRUD Project</a></li>
            <li><a href=""><i class="nav-icon fa fa-circle text-info"></i>CRUD System Login User</a></li>
            
            <!-- <li><a href="{{ url('system-management/role') }}">role</a></li>
            <li><a href="{{ url('system-management/project') }}">project</a></li>
            <li><a href="{{ url('system-management/state') }}">State</a></li>
            <li><a href="{{ url('system-management/city') }}">City</a></li> -->
            <!-- <li><a href="{{ url('system-management/report') }}">Report</a></li> -->
          </ul>
        </li>
        <li><a href="{{ route('user-management.index') }}"><i class="nav-icon fa fa-copy text-warning"></i><span>User management</span></a></li>
        <li><a href=""> <i class="nav-icon fa fa-table text-warning"></i><span>Change Password</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>