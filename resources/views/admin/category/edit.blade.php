@extends('layouts.app')

@section('title', 'Category')

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
                    <h4 class="card-title ">Edit Slider</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    	@csrf
                    	@method('PATCH')
                    	<div class="row py-2">
	                      <div class="col-md-12">
	                        <div class="form-group">
	                          <label class="bmd-label-floating">Category Name</label>
	                          <input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}">
	                        </div>
	                      </div>
                    	</div>
                    	<a href="{{ route('category.index') }}" class="btn btn-danger">Back</a>
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