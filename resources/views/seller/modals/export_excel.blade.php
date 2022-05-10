 
           
                   <!-- Modal -->
                   <div class="modal fade" id="excel" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Import Products</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="seller-import-products" enctype="multipart/form-data">
                                @csrf
                  
                                <input id="shop_id" type="text" class="form-control @error('shop_id') is-invalid @enderror" name="shop_id" value="{{Session::get('shop_id') }}" hidden autocomplete="shop_id">
                                <input id="owner_id" type="text" class="form-control @error('owner_id') is-invalid @enderror" name="owner_id" value="{{ Session::get('owner_id') }}" hidden autocomplete="owner_id">
                                <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="Month" hidden autocomplete="type">
          
                                <div class="form-group row">
                                  
                                
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Select File</label>
                                            <div class="input-group">
                                              <div class="custom-file">
                                                <input type="file" class="form-control" name="file">
                                              </div>
                                              <div class="input-group-append">
                                                <span class="input-group-text">  
                                                    <button type="submit" class="btn btn-primary">
                                                    {{ __('Upload..') }}
                                                </button>
                                              </span>
                                              </div>
                                            </div>
                                          </div>
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
                  