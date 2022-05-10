

      @extends('layouts.seller')

      <?php
      App::setLocale(Session::get('locale'));
      ?>
      
      @section('content')
          <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
            <div class="container-fluid">
      
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
               
                  <h1 class="m-0 text-dark">Sales Dashboard</h1>
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
                            @if(count((array)$data) > 0)
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="car">
                                          <div class="card-header">

                                             <div class="row">
                                               <div class="col-md-4">
                                                <div class="card card-outline card-secondary">
                                                  <div class="card-header bg-" style="background-color: #fc8803">
                                                    <h3 class="card-title text-white">Today's Sales: </h3>
                                    
                                                    <div class="card-tools">
                                                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                      </button>
                                                    </div>
                                                    <!-- /.card-tools -->
                                                  </div>
                                                  <!-- /.card-header -->
                                                  <div class="card-body">
                                                    <h3 class="text-info"> &nbsp; {{$daySales}} {{Session::get('money')}}</h3>
                                                    </div>
                                                  <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                               </div>
                                               <div class="col-md-4">
                                                  <div class="card card-outline card-secondary">
                                                <div class="card-header" style="background-color: #fc8803">
                                                   <h3 class="card-title text-white">  Today's Profit   </h3>
                                  
                                                  <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                    </button>
                                                  </div>
                                                  <!-- /.card-tools -->
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                  <h3 class="text-info"> &nbsp; {{$dayProfit}} {{Session::get('money')}}</h3>
                                                  </div>
                                                <!-- /.card-body -->
                                              </div>
                                              <!-- /.card -->
                                            </div>
                                               <div class="col-md-4">
                                                <div class="card card-outline card-secondary">
                                                  <div class="card-header bg-inf" style="background-color: #fc8803">
                                                    <h3 class="card-title text-white">Total Discout: </h3>
                                    
                                                    <div class="card-tools">
                                                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                      </button>
                                                    </div>
                                                    <!-- /.card-tools -->
                                                  </div>
                                                  <!-- /.card-header -->
                                                  <div class="card-body">
                                                    <h3 class="text-info"> &nbsp; {{$month_sales}} {{Session::get('money')}}</h3>
                                                    </div>
                                                  <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                               </div>

                   
                                               
                                             </div>
                                            <div class="card-tools">
                                           

                                              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                              </button>
                                              
                                              <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                              </button>
                                            </div><br>
                                            <h5 class="card-title">Sales Book</h5>
                                          </div>
                                        
                                            <div class="card-body">
                                              <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                  <th>Product Name</th>
                                                  <th> Sales Date</th>
                                                  <th>Product Category</th>
                                                  <th>unit</th>
                                                  <th>quantity</th>
                                                  <th>Amount Sold</th>
                                                  <th>purchased Price</th>
                                                  <th>Selling Price</th>
                                                  <th>Discount</th>
                                                  <th>Final Selling Price</th>
                                                  <th>  Prifit</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                              
                    {{-- Full texts	
                      
Full texts	
id
product_id
seller_id
owner_id
shop_id
day
month
year
sales_date Ascending 1
quantity
amount
sold_price
true_price
discount
profit
created_at
updated_at
                id	name	owner_id	shop_id	category	unit	quantity	amount	purchased_price	sold_price	expire	created_at	updated_at	
                    --}}
                                          @foreach($data as $value)
                                      
                                        <tr>
                                          <td>{{$value->name}}</td>
                                          <td>{{$value->sales_date}}</td>
                                          <td>{{$value->category}}</td>
                                          <td>{{$value->unit}}</td>
                                          <td>{{$value->quantity}}</td>
                                         
                                          <td>{{$value->amount}}
                                          </td>
                                          <td>{{$value->purchased_price}}</td>
                                          <td>{{$value->sold_price}}</td>
                                          <td>{{$value->discount}}</td>
                                          <td>{{$value->true_price}}</td>
                                          <td>{{$value->profit}}</td>
                                         
                                        
                                        

                                        </tr> 
                                      
                      
                                      @endforeach
                                              
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>Product Name</th>
                                                  <th> Sales Date</th>
                                                  <th>Product Category</th>
                                                  <th>unit</th>
                                                  <th>quantity</th>
                                                  <th>Amount Sold</th>
                                                  <th>purchased Price</th>
                                                  <th>Selling Price</th>
                                                  <th>Discount</th>
                                                  <th>Final Selling Price</th>
                                                  <th>  Prifit</th>
                                                </tr>
                                                </tfoot>
                                              </table>
                                            </div>
                                            <!-- /.card-body -->
                                          </div>
                                        <!-- /.card -->
                                      </div>
                                      <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                  @else
                            
                            <div class="row">
                                <div class="col-md-12">
                                  <div class="card">
                                    <div class="card-header">
                                      <h5 class="card-title">Sales Book</h5>
                
                                      <div class="card-tools">
                                       
                            
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                          <i class="fas fa-minus"></i>
                                        </button>
                                        
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                          <i class="fas fa-times"></i>
                                        </button>
                                      </div>
                                    </div>
                                  
                                      <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                          <thead>
                                          <tr>
                                            <th>Product Name</th>
                                            <th> Sales Date</th>
                                            <th>Product Category</th>
                                            <th>unit</th>
                                            <th>quantity</th>
                                            <th>Amount Sold</th>
                                            <th>purchased Price</th>
                                            <th>Selling Price</th>
                                            <th>Discount</th>
                                            <th>Final Selling Price</th>
                                            <th>  Prifit</th>
                                          </tr>
                                          </thead>
                                          <tbody>
                                      
                                        
                                          </tbody>
                                          <tfoot>
                                          <tr>
                                            <th>Product Name</th>
                                            <th> Sales Date</th>
                                            <th>Product Category</th>
                                            <th>unit</th>
                                            <th>quantity</th>
                                            <th>Amount Sold</th>
                                            <th>purchased Price</th>
                                            <th>Selling Price</th>
                                            <th>Discount</th>
                                            <th>Final Selling Price</th>
                                            <th>  Prifit</th>
                                          </tr>
                                          </tfoot>
                                        </table>
                                      </div>
                                      <!-- /.card-body -->
                                    </div>
                                  <!-- /.card -->
                                </div>
                                <!-- /.col -->
                              </div>
                              <!-- /.row -->
                    
                  @endif
                    
            
      
              </div>

             
            </div><!--/. container-fluid -->
          </section>
          <!-- /.content -->
          
        </div>
        
      @endsection
      
        