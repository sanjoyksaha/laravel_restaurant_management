@extends('layouts.app')

@section('title', 'Message')

@push('css')
  
 

@endpush

@section('content')

  <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title ">Subject: {{ $contact->subject }}</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                    	<div class="col-md-12">
                    		<h5 class="font-weight-bold">Name: {{ $contact->name }}</h5>
                    		<h5 class="font-weight-bold">Email: {{ $contact->email }}</h5>
                    		<h4 class="font-weight-bold">Message: </h4>
                    		<p class="font-italic">{{ $contact->message }}</p>
                    	</div>
                    </div>
                    <a href="{{ route('contact.index')}}" class="btn btn-primary">Back</a>
                  </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
  </div>

@endsection

@push('scripts')

@endpush