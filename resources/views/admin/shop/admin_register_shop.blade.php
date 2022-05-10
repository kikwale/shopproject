


@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">


          
       
        <div class="row mb-2">
           
          <div class="col-sm-6">
         
            <h1 class="m-0 text-dark">Shop Registration</h1>
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
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Ok !! </strong> {{session('success')}}.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    @elseif(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Please !! </strong>Error has occured.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
            
                    @endif
                    <div class="card">
                      <div class="card-header">
                        <h5 class="card-title">Traders</h5>

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
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Middle Name</th>
                              <th>Gender</th>
                              <th>Phone</th>
                              <th>email</th>
                              <th>role</th>
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
                                      <td>{{$value->fname}}</td>
                                      <td>{{$value->mname}}</td>
                                      <td>{{$value->lname}}</td>
                                      <td>{{$value->gender}}</td>
                                      <td>{{$value->phone}}</td>
                                      <td>{{$value->email}}</td>
                                      <td>{{$value->role}}</td>
                                     
                                   
                                      <td>
                                     
                                      <a class="btn btn-info btn-sm" href="register_shop?id={{$value->id}}" data-toggle="modal" data-target="#staticBackdrop{{$value->id}}">
                                      
                                    Register
                                    </a>
                                      
                                      </td>
                                       <!-- Modal -->
 <div class="modal fade" id="staticBackdrop{{$value->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content ">
        <div class="modal-header bg-info">
        <h5 class="modal-title" id="staticBackdropLabel">Create Shop</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
                            <div class="card ">
                                <div class="card-header">{{ __('Create') }}</div>

                                <div class="card-body">
                                    <form method="POST" action="/admin_save_shop">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Shop Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="user_id" type="text" hidden class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ $value->id }}" required autocomplete="name" autofocus>
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country Located') }}</label>

                                            <div class="col-md-6">
                                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country">

                                                @error('country')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="region" class="col-md-4 col-form-label text-md-right">{{ __('Region Located') }}</label>

                                            <div class="col-md-6">
                                                <input id="region" type="text" class="form-control @error('region') is-invalid @enderror" name="region" value="{{ old('region') }}" required autocomplete="region">

                                                @error('region')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="district" class="col-md-4 col-form-label text-md-right">{{ __('District Located') }}</label>

                                            <div class="col-md-6">
                                                <input id="district" type="text" class="form-control @error('district') is-invalid @enderror" name="district" required autocomplete="district">

                                                @error('district')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="ward" class="col-md-4 col-form-label text-md-right">{{ __('Ward Located') }}</label>

                                            <div class="col-md-6">
                                                <input id="ward" type="text" class="form-control @error('ward') is-invalid @enderror" name="ward" autocomplete="ward" placeholder="Option">

                                                @error('ward')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="street" class="col-md-4 col-form-label text-md-right">{{ __('Street Located') }}</label>

                                            <div class="col-md-6">
                                                <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" required autocomplete="street">

                                                @error('street')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tin" class="col-md-4 col-form-label text-md-right">{{ __('TIN') }}</label>

                                            <div class="col-md-6">
                                                <input id="tin" type="text" class="form-control @error('tin') is-invalid @enderror" name="tin" required autocomplete="tin">

                                                @error('tin')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>


    </div>
</div>
                                    </tr>
                                @endforeach
                          
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Middle Name</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>email</th>
                                <th>role</th>
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
                  <h5 class="card-title">Traders</h5>

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
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Middle Name</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>email</th>
                        <th>role</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                   
                    
                      </tbody>
                      <tfoot>
                      <tr>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Middle Name</th>
                          <th>Gender</th>
                          <th>Phone</th>
                          <th>email</th>
                          <th>role</th>
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

  