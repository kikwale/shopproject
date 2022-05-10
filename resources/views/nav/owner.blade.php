

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-info" style="background-color:#27AAE1">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-white"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      {{-- <a class="text-white" href="home" class="nav-link">Home</a> --}}
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      {{-- <a href="#" class="nav-link">Contact</a> --}}
    </li>
  </ul>

  <!-- SEARCH FORM -->
  <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
      {{-- <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search"> --}}
      <div class="input-group-append">
        {{-- <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button> --}}
      </div>
    </div>
  </form>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      {{-- <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-comments"></i>
        <span class="badge badge-danger navbar-badge">3</span>
      </a> --}}
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Brad Diesel
                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">Call me whenever you can...</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                John Pierce
                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">I got your message bro</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Nora Silvester
                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">The subject goes here</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
      </div>
    </li>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-user text-white"></i>
        
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        {{-- <span class="dropdown-item dropdown-header">15 Notifications</span> --}}
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-user mr-2"></i> Profile
          {{-- <span class="float-right text-muted text-sm">3 mins</span> --}}
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fas fa-lock mr-2"></i>Change Password
          {{-- <span class="float-right text-muted text-sm">12 hours</span> --}}
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>

        <div class="dropdown-divider"></div>
        {{-- <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> --}}
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
          class="fas fa-th-larg"></i></a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->


<!-- Main Sidebar Container --> 
<aside class="main-sidebar sidebar-dark- elevation-4" style="background-color:#024263f1">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="dist/img/shotram.png" alt="ShoTram Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Traders Panel</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="home" class="d-block">{{Auth::user()->fname}}</a>
      </div>
    </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" style="background-color:#024263f1">
          <div class="input-group-append">
            <button class="btn btn-sidebar" style="background-color:#024263f1">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="shop_worker?ower_id={{Session::get('owner_id')}}&&shop_id={{Session::get('shop_id')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                {{__('message.seller.workers')}}
              </p>
            </a>


          </li>

          <li class="nav-item">
            <a href="owner-sold-product?id={{Session::get('owner_id')}}&&shop_id={{Session::get('shop_id')}}" class="nav-link">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Sales
              </p>
            </a>
        
          </li>

          <li class="nav-item">
            <a href="owner-receipt" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Receipts
              </p>
            </a>
        
          </li>

    
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>
                Products
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
          
            

            <li class="nav-item">
              <a href="owner-stock" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                Stock
              </a>
            </li>
            <li class="nav-item">
              <a href="owner-expired-products" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Expired Products</p>
              </a>
            </li>

          </ul>
        </li>

        <li class="nav-item has-treeview">
          {{-- <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
            Profit
              <i class="fas fa-angle-left right"></i>
              {{-- <span class="badge badge-info right">6</span> 
            </p>
          </a> --}}
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="owner-net-profit" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Net Profit/Loss</p>
              </a>
            </li>
           
           
            <li class="nav-item">
              <a href="owner-expenses" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                 Expenses
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
            Orders
              <i class="fas fa-angle-left right"></i>
              {{-- <span class="badge badge-info right">6</span> --}}
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="owner-incoming-order" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
             Incoming Order
              </a>
            </li>
            <li class="nav-item">
              <a href="owner-placed-order" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>My Order</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="owner-delivered-order" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Delivered Order</p>
              </a>
            </li>
           
           
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
            Shop Settings
              <i class="fas fa-angle-left right"></i>
              {{-- <span class="badge badge-info right">6</span> --}}
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              {{-- <a href="owner-register-year" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  Register Year <!-- modal --->
              </a>
            </li> --}}
            <li class="nav-item">
              <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                 Logo <!-- modal --->
              </a>
            </li>
            <li class="nav-item">
              <a href="adminPrimary" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Shop Email</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="adminPrimary" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Color Settings</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="owner-money" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Money Symbol</p>
              </a>
            </li>
           
           
          </ul>
        </li>


        <li class="nav-item has-treeview">
          {{-- <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
             University Leaders
              <i class="fas fa-angle-left right"></i>
              {{-- <span class="badge badge-info right">6</span> --}}
            {{-- </p>
          </a>  --}}
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="selectLeader" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Select Leader</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="adminViewLeader" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View</p>
              </a>
            </li>
          
           
          </ul>
        </li>
       
          
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
    
  </div>
  <!-- /.sidebar -->
  
</aside>