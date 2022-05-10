<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-info navbar-i" style="background-color:#27AAE1" >
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-white"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      {{-- <a href="index3.html" class="nav-link">Home</a> --}}
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
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell text-warning"></i>
        
          <?php $count = 0; ?>
          @foreach (App\Models\Product::where('shop_id',Session::get('shop_id'))->where('expire','<=',date('Y-m-d'))
          ->where('isExpired',0)->get() as $value)
            <?php $count = $count+1; ?>
          @endforeach

          @if (App\Models\Order::where('ordered_shop_id',Session::get('shop_id'))->where('status','normal')->get() != "")
          @foreach (App\Models\Order::where('ordered_shop_id',Session::get('shop_id'))->where('status','normal')->get()
          as $value)
           <?php $count = $count+1; ?>
         @endforeach
          @endif
         
          @if ($count != 0)
          <span class="badge badge-danger navbar-badge">
          {{ $count }}
             
        </span>
          @endif
       
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

        @foreach (App\Models\Product::where('shop_id',Session::get('shop_id'))->where('expire','<=',date('Y-m-d'))
        ->where('isExpired',0)->get() as $value)
          <a href="seller-notify-expired?item={{ $value->id }}" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/warning-symbol-01.png" alt="Warning" class="mr-3 img-circle" height="40px;">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                NEW EXPIRED PRODUCTS
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                {{-- <p class="text-sm text-muted">{{ $value->name }}</p>
                <p class="text-sm text-muted">{{ $value->category }}</p> --}}
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
        @endforeach

        <?php  $i = 0;?><!-- TUTAONGEZA NOTIFIED WHERE CLOUSE -->
        @foreach (App\Models\Order::where('ordered_shop_id',Session::get('shop_id'))->where('status','normal')->get() as $value)
          <a href="seller-notify-order?item={{ $value->id }}" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <?php $i = $i+1; ?>
              {{-- <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
               --}}
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  NEW ORDER &nbsp; {{ $i }}
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
        @endforeach
        
        
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link text-secondary" data-toggle="dropdown" href="#">

          <p>{{__('message.language')}}</p>

        
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        {{-- <span class="dropdown-item dropdown-header">15 Notifications</span> --}}
        <div class="dropdown-divider"></div>
        <a href="en" class="dropdown-item">
         English
          {{-- <span class="float-right text-muted text-sm">3 mins</span> --}}
        </a>
        <div class="dropdown-divider"></div>
        <a href="sw" class="dropdown-item">
        Swahili
          {{-- <span class="float-right text-muted text-sm">12 hours</span> --}}
        </a>
        <div class="dropdown-divider"></div>
       

        {{-- <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> --}}
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
                               <i class="fa fa-sign-out" aria-hidden="true"></i>    {{ __('Logout') }}
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
<aside class="main-sidebar sidebar-dark-prima elevation-4" style="background-color:#024263f1">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/shotram.png" alt="ShoTram Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Seller Panel</span>
    </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->fname}}</a>
        </div>
      </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" style="background-color:#024263f1">
        <div class="input-group-append">
          <button class="btn btn-sidebar"  style="background-color:#024263f1">
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
        <li class="nav-item has-treeview menu-open">
          <a href="home" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
         {{__('message.seller.dashboard')}}
            </p>
          </a>
         
        </li>
      
        <li class="nav-item has-treeview">
          <a href="seller_shop_workers?ower_id={{Session::get('owner_id')}}&&shop_id={{Session::get('shop_id')}}" class="nav-link">
            {{-- <i class="nav-icon fas fa-users"></i> --}}
            <img src="dist/img/users-icon-01.png" alt="" srcset="">
            <p>
            {{__('message.seller.workers')}}
              {{-- <span class="badge badge-info right">6</span> --}}
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <img src="dist/img/sales-icon-01.png" alt="" srcset="">
            <p>
               {{__('message.seller.sales')}}
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
          
            <li class="nav-item">
              <a href="seller_selling_product?id={{Session::get('owner_id')}}&&shop_id={{Session::get('shop_id')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('message.seller.start_selling')}}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="seller-sold-product?id={{Session::get('owner_id')}}&&shop_id={{Session::get('shop_id')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p> {{__('message.seller.sales')}}</p>
              </a>
            </li>
            

          </ul>
        </li>


        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            {{-- <i class="nav-icon fas fa-shopping-bag" aria-hidden="true"></i> --}}
            <img src="dist/img/receipt-icon-01.png" alt="" srcset="">
            <p>
               {{__('message.receipt')}}
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
          
            <li class="nav-item">
              <a href="seller-receipt-data?id={{Session::get('owner_id')}}&&shop_id={{Session::get('shop_id')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  {{__('message.seller.print_receipts')}}
              </a>
            </li>
            <li class="nav-item">
              <a href="seller_printed_receipt?id={{Session::get('owner_id')}}&&shop_id={{Session::get('shop_id')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>   {{__('message.seller.printed_receipts')}}</p>
              </a>
            </li>

          </ul>
        </li>

        
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            {{-- <i class="nav-icon fas fa-store" ></i> --}}
            <img src="dist/img/product-icon-01.png" alt="" srcset="">
            <p>
                {{__('message.seller.product')}}
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
          
            {{-- <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                Wholesale
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="seller_add_jumla_product?id={{Session::get('owner_id')}}&&shop_id={{Session::get('shop_id')}}" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Add</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="seller_view_jumla_product?id={{Session::get('owner_id')}}&&shop_id={{Session::get('shop_id')}}" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>view</p>
                  </a>
                </li>
              </ul>
            </li> --}}
         
            <li class="nav-item has-treeview">
              <a href="seller_add_rejareja_product?id={{Session::get('owner_id')}}&&shop_id={{Session::get('shop_id')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  {{__('message.seller.register_products')}}
                </p>
              </a>
              {{-- <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="seller_add_rejareja_product?id={{Session::get('owner_id')}}&&shop_id={{Session::get('shop_id')}}" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Add</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="seller_view_rejareja_product?id={{Session::get('owner_id')}}&&shop_id={{Session::get('shop_id')}}" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>View</p>
                  </a>
                </li>
              </ul> --}}
            </li>

         

            {{-- <li class="nav-item">
              <a href="seller_finished_product?id={{Session::get('owner_id')}}&&shop_id={{Session::get('shop_id')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Product Returned</p>
              </a>
            </li> --}}

            <li class="nav-item">
              <a href="seller_finished_product?id={{Session::get('owner_id')}}&&shop_id={{Session::get('shop_id')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>   {{__('message.seller.finished_products')}}</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="seller_store?id={{Session::get('owner_id')}}&&shop_id={{Session::get('shop_id')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>   {{__('message.seller.store')}}</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="seller_expired_product?id={{Session::get('owner_id')}}&&shop_id={{Session::get('shop_id')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  {{__('message.seller.expired_products')}}
              </a>
            </li>
           

          </ul>
        </li>

      

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <img src="dist/img/order-icon-01.png" alt="" srcset="">
            {{-- <i class="nav-icon fas fa-store" ></i> --}}
            <p>
         {{__('message.seller.order')}}
              <i class="fas fa-angle-left right"></i>
              {{-- <span class="badge badge-info right">6</span> --}}
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="seller-place-order?id={{Session::get('owner_id')}}&&shop_id={{Session::get('shop_id')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  {{__('message.seller.place_order')}}
              </a>
            </li>

            <li class="nav-item">
              <a href="seller-placed-order?id={{Session::get('owner_id')}}&&shop_id={{Session::get('shop_id')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  {{__('message.seller.my_orders')}}
              </a>
            </li>

            <li class="nav-item">
              <a href="seller-incoming-order?id={{Session::get('owner_id')}}&&shop_id={{Session::get('shop_id')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
              
                  @if (App\Models\Order::where('status','normal')->where('ordered_shop_id',Session::get('shop_id'))->count() != 0)
                  <span class="badge badge-info navbar-badge">
                 
                  {{ App\Models\Order::where('status','normal')->where('ordered_shop_id',Session::get('shop_id'))->count() }}
                </span>
                  @endif
             
                  <p>    {{__('message.seller.incoming_orders')}}</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="seller-delivered-order?id={{Session::get('owner_id')}}&&shop_id={{Session::get('shop_id')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>   {{__('message.seller.delivered_orders')}}</p>
              </a>
            </li>

           
           
           
          </ul>
        </li>

        {{-- <li class="nav-item">
          <a href="seller-calendar" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Calendar
               <span class="badge badge-info right">2</span> 
            </p>
          </a>
        </li> --}}
        
        <li class="nav-item">
          <a href="seller-general-profile?id={{Session::get('owner_id')}}&&shop_id={{Session::get('shop_id')}}" class="nav-link">
              <i class="far fa-user nav-icon"></i>
              {{__('message.seller.general_profile')}}
          </a>
        </li>
        {{-- <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
           Farm Products
              <i class="fas fa-angle-left right"></i>
              {{-- <span class="badge badge-info right">6</span> 
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                 Add User
              </a>
            </li>
            <li class="nav-item">
              <a href="adminPrimary" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Users</p>
              </a>
            </li>
           
           
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
            Report
              <i class="fas fa-angle-left right"></i>
       
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                 Add User
              </a>
            </li>
            <li class="nav-item">
              <a href="adminPrimary" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View Users</p>
              </a>
            </li> --}}
           
           
          {{-- </ul>
        </li>


        <li class="nav-item has-treeview">
          {{-- <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
             University Leaders
              <i class="fas fa-angle-left right"></i>
              {{-- <span class="badge badge-info right">6</span> --}}
            {{-- </p>
          </a>  --
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
        </li> --}}
       
       
          
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>







