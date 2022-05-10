 
           
                   <!-- Modal -->
                   <div class="modal fade" id="sold_day" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-l modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Create User</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="seller-daily-product-sold">
                                @csrf
                  
                                <input id="shop_id" type="text" class="form-control @error('shop_id') is-invalid @enderror" name="shop_id" value="{{Session::get('shop_id') }}" hidden autocomplete="shop_id">
                                <input id="owner_id" type="text" class="form-control @error('owner_id') is-invalid @enderror" name="owner_id" value="{{ Session::get('owner_id') }}" hidden autocomplete="owner_id">
                                <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="Day" hidden autocomplete="type">
          
                                <div class="form-group row">
                                    <label for="day" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>
                  
                                    <div class="col-md-6">
                                        <input id="day" type="date" class="form-control @error('day') is-invalid @enderror" name="day" value="{{ old('day') }}" required autocomplete="day" autofocus>
                  
                                        @error('day')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                
                  
                                
                           
                  
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            {{ __('Continue..') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                  
                  
                    </div>
                  </div> 
                  