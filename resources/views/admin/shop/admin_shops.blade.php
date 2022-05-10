


@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

        <div class="row mb-2">
          <div class="col-sm-6">
         
            <h1 class="m-0 text-dark">Shops</h1>
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
      
           
          {{-- @include('admin.include') --}}
        @if(count((array)$data) > 0)
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <h5 class="card-title">Shops</h5>

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
                                <th>Shop Name</th>
                
                                <th>Country Located</th>
                                <th>Region Located</th>
                                <th>District</th>
                                <th>Ward</th>
                                <th>Street</th>
                                <th>TIN</th>
                                <th>Owner Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                          
{{-- Full texts	
	
fname
mname
lname
gender
phone
email
email_verified_at
password
role
remember_token
created_at
updated_at
--}}
                                @foreach($data as $value)
                                    <tr>
                                      <td>{{$value->shop_name}}</td>
                                      <td>{{$value->country}}</td>
                                      <td>{{$value->region}}</td>
                                      <td>{{$value->district}}</td>
                                      <td>{{$value->ward}}</td>
                                      <td>{{$value->street}}</td>
                                      <td>{{$value->tin}} </td>
                                      <td>{{$value->fname}} &nbsp {{$value->lname}} </td>
                                     
                                   
                                      <td>
                                     
                                      <a class="btn btn-info btn-sm" href="adminViewUser?id={{$value->user_id}}&&dhfjhdhgfjhgfjdhfhghguh@#gfdf$=5hj5hjg$3$$$$$#*^fg">
                                        <i class="fas fa-edit">
                                        </i>
                                    edit
                                    </a>
                                      <a class="btn btn-danger btn-sm" href="adminDeleteUser?id={{$value->id}}">
                                          <i class="fas fa-trash">
                                          </i>
                                          Delete
                                      </a>
                                      </td>
                                    </tr>
                                @endforeach
                          
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Shop Name</th>
                
                        <th>Country Located</th>
                        <th>Region Located</th>
                        <th>District</th>
                        <th>Ward</th>
                        <th>Street</th>
                        <th>TIN</th>
                        <th>Owner Name</th>
                        <th>Action</th>
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
                  <h5 class="card-title">Shops</h5>

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
                        <th>Shop Name</th>
                
                        <th>Country Located</th>
                        <th>Region Located</th>
                        <th>District</th>
                        <th>Ward</th>
                        <th>Street</th>
                        <th>TIN</th>
                        <th>Owner Name</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                   
                    
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>Shop Name</th>
                
                        <th>Country Located</th>
                        <th>Region Located</th>
                        <th>District</th>
                        <th>Ward</th>
                        <th>Street</th>
                        <th>TIN</th>
                        <th>Owner Name</th>
                        <th>Action</th>
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
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
@endsection

  