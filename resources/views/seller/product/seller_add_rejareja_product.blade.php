


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

        <div class="row justify-content-center">
            <div class="col-md-12">
                
               
                <div class="car">
                    <div class="card-header">{{ __('Products Registration') }} &nbsp; Shop Owner Id = &nbsp; 000{{ $owner_id }} &nbsp; Shop Id = &nbsp; 000{{ $shop_id }}<br>
                    <a href="#" data-toggle="modal" data-target="#excel" class="btn btn-primary">Import Excel</a>
                    </div>
    
                    <div class="card-body">
                        <form method="POST" action="/seller_saveRejarejaProduct">
                            @csrf
    
                    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                    <input id="owner_id" type="text" class="form-control @error('owner_id') is-invalid @enderror" name="owner_id" hidden value="{{ $owner_id }}" required autocomplete="owner_id" autofocus>
    
                                    <input id="shop_id" type="text" class="form-control @error('shop_id') is-invalid @enderror" name="shop_id" hidden value="{{ $shop_id }}" required autocomplete="shop_id" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            
                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
    
                                <div class="col-md-6">
                                    <select id="category" type="text" class="form-control select2 @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" autocomplete="category" autofocus>
                                        <option value=""></option>
                                          
                                           <option value="{{ __('message.wholesale') }}">{{ __('message.wholesale') }}</option>
                                           <option value="{{ __('message.retail') }}">{{ __('message.retail') }}</option>
                                          
                                    </select>
                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="unit" class="col-md-4 col-form-label text-md-right">{{ __('Units') }}</label>
    
                                <div class="col-md-6">
                                    <select id="unit" type="text" class="form-control select2 @error('unit') is-invalid @enderror" name="unit" value="{{ old('unit') }}" autocomplete="unit" autofocus>
                                        <option value=""></option>
                                           @foreach (App\Models\UnitTable::all() as $value)
                                           <option value="{{ $value->name }}">{{ $value->name }}</option>
                                           @endforeach
                                    </select>
                                    @error('unit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
{{-- id	name	owner_id	shop_id	category	unit	quantity	amount	purchased_price	sold_price	expire	location	created_at	updated_at	 --}}

                            <div class="form-group row">
                                <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>
    
                                <div class="col-md-6">
                                    <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" placeholder="Option" autocomplete="quantity" autofocus>
    
                                    @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="subquantity" class="col-md-4 col-form-label text-md-right">{{ __('Sub-Quantity') }}</label>

                                <div class="col-md-6">
                                    <select id="subquantity" type="text" class="form-control select2 @error('subquantity') is-invalid @enderror" name="subquantity" value="{{ old('subquantity') }}"  autocomplete="subquantity" autofocus>
                                        <option value="">Option</option>
                                        <option value="0.5">1/2</option>
                                        <option value="0.25">1/4</option>
                                        <option value="0.75">3/4</option>
                                    </select>
                                    @error('subquantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Total Amount') }}</label>
                                 {{-- <input name="role" value="{{$role}}" hidden type="text"> --}}
                                <div class="col-md-6">
                                    <input id="amount" type="number" class="form-control" name="amount" required autocomplete="amount">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="notification" class="col-md-4 col-form-label text-md-right">{{ __('Product Quantity for notification') }}</label>
    
                                <div class="col-md-6">
                                    <input id="notification" type="number" class="form-control @error('notification') is-invalid @enderror" name="notification" value="{{ old('notification') }}" required autocomplete="notification">
    
                                    @error('notification')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                          
                            <div class="form-group row">
                                <label for="purchased_price" class="col-md-4 col-form-label text-md-right">{{ __('Purchased Price per Unit (Ex: 1kg)') }}</label>
    
                                <div class="col-md-6">
                                    <input id="purchased_price" type="float" class="form-control @error('purchased_price') is-invalid @enderror" name="purchased_price" value="{{ old('purchased_price') }}" required autocomplete="purchased_price">
    
                                    @error('purchased_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="sold_price" class="col-md-4 col-form-label text-md-right">{{ __('Price For Sale Price per Unit (Ex: 1kg)') }}</label>
    
                                <div class="col-md-6">
                                    <input id="sold_price" type="float" class="form-control @error('sold_price') is-invalid @enderror" name="sold_price" required autocomplete="sold_price">
    
                                    @error('sold_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="expire" class="col-md-4 col-form-label text-md-right">{{ __('Expire Date') }}</label>
    
                                <div class="col-md-6">
                                    <input id="expire" type="date" class="form-control @error('expire') is-invalid @enderror" name="expire" required autocomplete="expire">
    
                                    @error('expire')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Location/Shelf') }}</label>
    
                                <div class="col-md-6">
                                    <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" autocomplete="location">
    
                                    @error('location')
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
               
              @include('seller/modals.export_excel')
            </div>
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
@endsection

  