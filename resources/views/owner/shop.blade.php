
      @extends('layouts.owner')
      @section('content')
          <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
            <div class="container-fluid">
      
                           <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="dist/img/shotram.png" alt="ShoTramLogo" height="60" width="60">
    </div>
         {{-- <!-- Info boxes -->
       <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-i elevation-1" style="background-color:#006699" ><i class="fas fa-users text-white"></i></span>
    
            <div class="info-box-content">
              <span class="info-box-text">Total O-level {{Session::get('owner_id')}} {{Session::get('shop_id')}}</span>
              <span class="info-box-number">
              3546
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg- elevation-1" style="background-color:#006699"><i class="fas fa-users text-white"></i></span>
    
            <div class="info-box-content">
              <span class="info-box-text">Total A-level</span>
              <span class="info-box-number">4354</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
    
        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>
    
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-in elevation-1" style="background-color:#006699"><i class="fas fa-users text-white"></i></span>
    
            <div class="info-box-content">
              <span class="info-box-text">Undergraduates</span>
              <span class="info-box-number">2242</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-inf elevation-1" style="background-color:#006699"><i class="fas fa-users text-white"></i></span>
    
            <div class="info-box-content">
              <span class="info-box-text">Graduates</span>
              <span class="info-box-number">443</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row --> --}}


              <div class="row mb-2">
                <div class="col-sm-6">
               
                  <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->
      
          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
            
              @if (session('success'))
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Waoo!</strong> {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif

              @if (session('unsold') == "Sold")
             <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Ok !! </strong> Successfuly Product(s) Sold.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              @endif

              @if (session('sale_empty') == "empty")
             <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Ok !! </strong> No Product have been Sold
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              @endif

              @if (session('unsold1') == "Unsold")
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Ok !! </strong> Many Products You have sell than that Stored, You want to sell {{session('product_sold')}} Product(s) WHILE you have {{session('product_stored')}} Product(s)
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              @endif
                 
                {{-- @include('admin.include') --}}
                        
                <div class="row">
                <div class="col-md-4">
                  <a href="seller_shop_workers?ower_id={{Session::get('owner_id')}}&&shop_id={{Session::get('shop_id')}}">
                  <div class="card card-outline card-info">
                    <div class="card-header">
                      <h3 class="card-title"></h3>
      
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body text-secondary text-center">
                    <i class="fas fa-users w-100" style="color: cadetblue"></i><br>
                  <b> Employees </b>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </a>
                </div>

                <div class="col-md-4">
                  <a href="owner_shop">
                  <div class="card card-outline card-info">
                    <div class="card-header">
                      <h3 class="card-title"></h3>
      
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body text-secondary text-center">
                      <i class="fas fa-shopping-bag" style="color: cadetblue"></i><br>
                   <b> Monthly Sales </b>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </a>
                </div>

                <div class="col-md-4">
                  <a href="owner_shop">
                  <div class="card card-outline card-info">
                    <div class="card-header">
                      <h3 class="card-title"></h3>
      
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body text-secondary text-center">
                      <i class="fas fa-shopping-bag w-100" style="color: cadetblue"></i><br>
                   <b>  Daily Sales</b>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </a>
                </div>

                <div class="col-md-4">
                  <a href="owner_shop">
                  <div class="card card-outline card-info">
                    <div class="card-header">
                      <h3 class="card-title"></h3>
      
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body text-secondary text-center">
                    
                  <b> Expired Products</b>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </a>
                </div>

                <div class="col-md-4">
                  <a href="owner_shop">
                  <div class="card card-outline card-info">
                    <div class="card-header">
                      <h3 class="card-title"></h3>
      
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body text-secondary text-center">
                    
                    <b>Orders</b>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </a>
                </div>

                <div class="col-md-4">
                  <a href="owner_shop">
                  <div class="card card-outline card-info">
                    <div class="card-header">
                      <h3 class="card-title"></h3>
      
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body text-secondary text-center">
                    
                    <b>Store</b>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </a>
                </div>

                <div class="col-md-4">
                  <a href="owner_shop">
                  <div class="card card-outline card-info">
                    <div class="card-header">
                      <h3 class="card-title"></h3>
      
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body text-secondary text-center">
                    <b>Wholesale Products</b>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </a>
                </div>

                <div class="col-md-4">
                  <a href="owner_shop">
                  <div class="card card-outline card-info">
                    <div class="card-header">
                      <h3 class="card-title"></h3>
      
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body text-secondary text-center">
                    <b>Retail Products</b>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </a>
                </div>

                <div class="col-md-4">
                  <a href="owner_shop">
                  <div class="card card-outline card-info">
                    <div class="card-header">
                      <h3 class="card-title"></h3>
      
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body text-secondary text-center">
                    
                    <b>Finished Products</b>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </a>
                </div>

                

           </div>
         
                <br>
                    
            
      
              </div>

             
            </div><!--/. container-fluid -->
          </section>
          <!-- /.content -->
          
        </div>
        
      @endsection
      
        