<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
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
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('movies.index')}}"><i class="fa fa-circle-o"></i> Movies</a></li>
                    <li><a href="{{route('movies.create')}}"><i class="fa fa-edit"></i> Create</a></li>
                </ul>
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Persons</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('person.index')}}"><i class="fa fa-circle-o"></i> View All</a></li>
                    <li><a href="{{route('person.create')}}"><i class="fa fa-edit"></i> Create</a></li>
                </ul>
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-briefcase"></i> <span>Jobs</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route('jobs.index')}}"><i class="fa fa-circle-o"></i> View All</a></li>
                    <li><a href="{{route('jobs.create')}}"><i class="fa fa-edit"></i> Create</a></li>
                </ul>
            </li>
            <li class="active treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Cast
                    <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('cast.index')}}"><i class="fa fa-circle-o"></i> View All</a></li>
                    </li>
                </ul>
            </li>
            <li class="active treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Crew
                    <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('crew.index')}}"><i class="fa fa-circle-o"></i> View All</a></li>
                </ul>
            </li>
            <li class="active treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Photos
                    <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('photos.index')}}"><i class="fa fa-circle-o"></i> View All</a></li>
                    <li><a href="{{route('photos.create')}}"><i class="fa fa-circle-o"></i> Add New</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>