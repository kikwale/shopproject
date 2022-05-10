
      @extends('layouts.owner')
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

              @if (session('error') )
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Ops !! </strong>  {{session('error')}} 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              @endif
                 
                {{-- @include('admin.include') --}}


                <br>
                <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md-6"><h2><b>Enter Expenses to get Net Profit</b></h2></div>
                  <div class="col-md-3"></div>
                </div><br>

                  <form method="POST" action="/ownerNetProfitForm">
                    @csrf
      
                    <input id="shop_id" type="text" class="form-control @error('shop_id') is-invalid @enderror" name="shop_id" value="{{Session::get('shop_id') }}" hidden autocomplete="shop_id">
                    <input id="owner_id" type="text" class="form-control @error('owner_id') is-invalid @enderror" name="owner_id" value="{{ Session::get('owner_id') }}" hidden autocomplete="owner_id">
                    
                    <div class="form-group row">
                      
                      <label for="year" class="col-md-2 col-form-label text-md-right">{{ __('Year') }}</label>
                        <div class="col-md-3">
                          <select id="year" type="text" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year') }}"  autocomplete="year" autofocus>
                              <option value=""></option>
                              <option value="2022">2022</option>
                              <option value="2021">2021</option>
                              <option value="2020">2020</option>
                              <option value="2019">2019</option>
                              <option value="2018">2018</option>
                              <option value="2017">2017</option>
                              <option value="2016">2016</option>
                              <option value="2015">2015</option>
                          </select>
                          @error('year')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
      
                      
                      
                        <label for="month" class="col-md-2 col-form-label text-md-right">{{ __('Month') }}</label>
                        <div class="col-md-3">
                          <select id="month" type="text" class="form-control @error('month') is-invalid @enderror" name="month" value="{{ old('month') }}"  autocomplete="month" autofocus>
                              <option value=""></option>
                              <option value="Jan">1 (Jan)</option>
                              <option value="Feb">2 (Feb)</option>
                              <option value="Mar">3 (Mar)</option>
                              <option value="Apr">4 (Apr)</option>
                              <option value="May">5 (May)</option>
                              <option value="Jun">6 (Jun)</option>
                              <option value="Jul">7 (Jul)</option>
                              <option value="Aug">8 (Aug)</option>
                              <option value="Sep">9 (Sep)</option>
                              <option value="Oct">10 (Oct)</option>
                              <option value="Nov">11 (Nov)</option>
                              <option value="Des">12 (Des)</option>
                          </select>
                          @error('month')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
      
                  
      {{-- id	product_id	seller_id	owner_id	shop_id	day	month	year	quantity	amount	profit	created_at	updated_at	 --}}
      
      
                    <div class="form-group row">
                        <label for="rent" class="col-md-2 col-form-label text-md-right">{{ __('Rent') }}</label>
      
                        <div class="col-md-3">
                          <input id="rent" type="number" class="form-control @error('rent') is-invalid @enderror" name="rent" value="{{ old('rent') }}" placeholder="Option" autocomplete="rent" autofocus>
                          
                      
                          @error('rent')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                   
                      <label for="wage" class="col-md-2 col-form-label text-md-right"><sup class="text-danger"></sup>{{ __('Wages') }}</label>
      
                      <div class="col-md-3">
                          <input id="wage" type="number" class="form-control @error('wage') is-invalid @enderror" name="wage" value="{{ old('wage') }}" placeholder="Option" autocomplete="wage" autofocus>
                          
                      
                          @error('wage')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group row">
                    <label for="transport" class="col-md-2 col-form-label text-md-right">{{ __('Transport') }}</label>
  
                    <div class="col-md-3">
                      <input id="transport" type="number" class="form-control @error('transport') is-invalid @enderror" name="transport" value="{{ old('transport') }}" placeholder="Option" autocomplete="transport" autofocus>
                      
                  
                      @error('transport')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
               
                  <label for="salary" class="col-md-2 col-form-label text-md-right"><sup class="text-danger"></sup>{{ __('Salary') }}</label>
  
                  <div class="col-md-3">
                      <input id="salary" type="number" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary') }}" placeholder="Option" autocomplete="salary" autofocus>
                      
                  
                      @error('salary')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>

              <div class="form-group row">
                <label for="communication" class="col-md-2 col-form-label text-md-right">{{ __('Communication') }}</label>

                <div class="col-md-3">
                  <input id="communication" type="number" class="form-control @error('communication') is-invalid @enderror" name="communication" value="{{ old('communication') }}" placeholder="Option" autocomplete="communication" autofocus>
                  
              
                  @error('communication')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
           
              <label for="security" class="col-md-2 col-form-label text-md-right"><sup class="text-danger"></sup>{{ __('Security') }}</label>

              <div class="col-md-3">
                  <input id="security" type="number" class="form-control @error('security') is-invalid @enderror" name="security" value="{{ old('security') }}" placeholder="Option" autocomplete="security" autofocus>
                  
              
                  @error('security')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
            <label for="electricity" class="col-md-2 col-form-label text-md-right">{{ __('Electrical Bill') }}</label>

            <div class="col-md-3">
              <input id="electricity" type="number" class="form-control @error('electricity') is-invalid @enderror" name="electricity" value="{{ old('electricity') }}" placeholder="Option" autocomplete="electricity" autofocus>
              
          
              @error('electricity')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
       
          <label for="water" class="col-md-2 col-form-label text-md-right"><sup class="text-danger"></sup>{{ __('Water Bill') }}</label>

          <div class="col-md-3">
              <input id="water" type="number" class="form-control @error('water') is-invalid @enderror" name="water" value="{{ old('water') }}" placeholder="Option" autocomplete="water" autofocus>
              
          
              @error('water')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
      </div>

      <div class="form-group row">
        <label for="stationery" class="col-md-2 col-form-label text-md-right">{{ __('Stationery') }}</label>

        <div class="col-md-3">
          <input id="stationery" type="number" class="form-control @error('stationery') is-invalid @enderror" name="stationery" value="{{ old('stationery') }}" placeholder="Option" autocomplete="stationery" autofocus>
          
      
          @error('stationery')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
   
      <label for="other_expenses" class="col-md-2 col-form-label text-md-right"><sup class="text-danger"></sup>{{ __('Other Expenses') }}</label>

      <div class="col-md-3">
          <input id="other_expenses" type="number" class="form-control @error('other_expenses') is-invalid @enderror" name="other_expenses" value="{{ old('other_expenses') }}" placeholder="Option" autocomplete="other_expenses" autofocus>
          
      
          @error('other_expenses')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>

      
  </div>
      <div class="form-group row">
        <label for="condition" class="col-md-2 col-form-label text-md-right">{{ __('Save') }}</label>

        <div class="col-md-3">
          <input id="condition" type="radio" required class=" @error('condition') is-invalid @enderror" name="condition" value="1" placeholder="Option" autocomplete="condition" autofocus>
          
      
          @error('condition')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
   
      <label for="condition" class="col-md-2 col-form-label text-md-right"><sup class="text-danger"></sup>{{ __('Dont save') }}</label>

      <div class="col-md-3">
          <input id="condition" type="radio" required class=" @error('other_expenses') is-invalid @enderror" name="condition" value="2" placeholder="Option" autocomplete="condition" autofocus>
          
      
          @error('condition')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>

      
  </div>

  
</div>
      
                
      
                    <div class="form-group row mb-0">
                      <div class="col-md-8"></div>
                        <div class="col-md-4 offset-md-">
                            <button type="submit" class="btn btn-primary btn-sm">
                                {{ __('Search Profit..') }}
                            </button>
                        </div>
                    </div>
                </form>
           
           <br>
                                  <!-- Info boxes -->
       <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-i elevation-1" style="background-color:#F15A29" ><i class="fas fa-users text-white"></i></span>
    
            <div class="info-box-content">
              <span class="info-box-text">Net Profit/Loss:</span>
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
            <span class="info-box-icon bg- elevation-1" style="background-color:#F15A29"><i class="fas fa-users text-white"></i></span>
    
            <div class="info-box-content">
              <span class="info-box-text">Total Profit</span>
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
            <span class="info-box-icon bg-in elevation-1" style="background-color:#F15A29"><i class="fas fa-users text-white"></i></span>
    
            <div class="info-box-content">
              <span class="info-box-text">Total Expenses</span>
              <span class="info-box-number">2242</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-inf elevation-1" style="background-color:#F15A29"><i class="fas fa-users text-white"></i></span>
    
            <div class="info-box-content">
              <span class="info-box-text">Total Sales</span>
              <span class="info-box-number">443</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


      
              </div><br>

              
             
            </div><!--/. container-fluid -->
          </section>
          <!-- /.content -->
          @include('owner/models.day_receipt_modal')
          @include('owner/models.month_receipt_modal')
          @include('owner/models.annual_receipt_modal')
        </div>
        
        
      @endsection
     
        