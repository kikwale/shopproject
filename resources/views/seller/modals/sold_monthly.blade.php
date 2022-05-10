 
           
                   <!-- Modal -->
                   <div class="modal fade" id="sold_month" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Create User</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="seller-monthly-product-sold">
                                @csrf
                  
                                <input id="shop_id" type="text" class="form-control @error('shop_id') is-invalid @enderror" name="shop_id" value="{{Session::get('shop_id') }}" hidden autocomplete="shop_id">
                                <input id="owner_id" type="text" class="form-control @error('owner_id') is-invalid @enderror" name="owner_id" value="{{ Session::get('owner_id') }}" hidden autocomplete="owner_id">
                                <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="Month" hidden autocomplete="type">
          
                                <div class="form-group row">
                                  
                                    <div class="col-md-6">
                                        <label for="month" class="col-md- col-form-label text-md-right">{{ __('Month') }}</label>
                  
                                        <select id="month" type="text" class="form-control select2 @error('month') is-invalid @enderror" name="month" value="{{ old('month') }}"  autocomplete="month">
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

                    
                                    <div class="col-md-6">
                                        <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Year') }}</label>
                          
                                        <select id="year" type="text" class="form-control select2 @error('year') is-invalid @enderror" name="year" value="{{ old('year') }}"  autocomplete="year">
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
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                  
                           
                  
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-0">
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
                  