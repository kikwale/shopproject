                          <!-- Modal -->
                          <div class="modal fade" id="staticBackdrop{{Auth::id()}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                        <div class="card-header">{{ __('Create Shop') }} </div>
                        
                                                        <div class="card-body">
                                                            <form method="POST" action="/owner_save_shop">
                                                                @csrf
                        
                                                                <div class="form-group row">
                                                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Shop Name')  }}</label>
                        
                                                                    <div class="col-md-6">
                                                                        <input id="user_id" type="text" hidden class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ Auth::id() }}" required autocomplete="name" autofocus>
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
                                                                        <input id="tin" type="text" class="form-control @error('tin') is-invalid @enderror" name="tin" placeholder="Option" required autocomplete="tin">
                        
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