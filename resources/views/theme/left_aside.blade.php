<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
       @if(isset(auth()->user()->id ))
        <p>{{ ucfirst(auth()->user()->first_name)." ".ucfirst(auth()->user()->last_name)}}</p>
        @endif
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
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">HEADER</li>
      <!-- Optionally, you can add icons to the links -->
      @role('admin|superadmin')
      <li class="active"><a href="{{url('admin/user')}}"><i class="fa fa-link"></i> <span>Manage User</span></a></li>
      <li><a href="{{url('admin/banner')}}"><i class="fa fa-link"></i> <span>Manage Banner</span></a></li>
      <li><a href="{{url('admin/category')}}"><i class="fa fa-link"></i> <span>Manage Category</span></a></li>
    

      <li><a href="{{url('admin/product')}}"><i class="fa fa-link"></i> <span>Manage Product</span></a></li>
      <li><a href="{{url('admin/coupon')}}"><i class="fa fa-link"></i> <span>Manage Coupon</span></a></li>
      @endrole
  
      <li><a href="{{ url('admin/role') }}"><i class="fa fa-link"></i> <span>Manage Role</span></a></li>
      <li><a href="{{ url('admin/order') }}"><i class="fa fa-link"></i> <span>Manage Order</span></a></li>
     
      <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#">Link in level 2</a></li>
          <li><a href="#">Link in level 2</a></li>
        </ul>
      </li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>