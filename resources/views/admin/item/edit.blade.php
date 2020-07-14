@extends('layouts.app')

@section('title', 'Food Item-Edit')

@push('css')

@endpush

@section('content')

  <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
				
				@include('layouts.include.msg')
				

                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title ">Edit Food Item</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('item.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    	@csrf
                    	@method('PATCH')
                    	
	                      <div class="row py-2">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Food Category</label>
                            <select name="category" id="" class="form-control">
                              @foreach($categories as $category)
                                <option {{ $category->id == $item->category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->category_name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row py-2">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Item Name</label>
                            <input type="text" class="form-control" name="name" value={{ $item->name }}>
                          </div>
                        </div>
                      </div>
                      <div class="row py-2">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Description</label>
                            <textarea name="description" class="form-control">{{ $item->description }}</textarea>
                          </div>
                        </div>
                      </div>
                      <div class="row py-2">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Price</label>
                            <input type="number" class="form-control" name="price" value={{ $item->price }}>
                          </div>
                        </div>
                      </div>
                      <div class="row py-2">
                        <div class="col-md-12">
                            <label class="bmd-label-floating">Image</label>
                            <input type="file" name="image">
                        </div>
                      </div>
	                      
                    	
                    	<a href="{{ route('item.index') }}" class="btn btn-danger">Back</a>
                    	<button type="submit" class="btn btn-primary">Update</button>
                    </form>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
  </div>

@endsection

@push('scripts')


@endpush