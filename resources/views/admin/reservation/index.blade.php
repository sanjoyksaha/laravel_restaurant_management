@extends('layouts.app')

@section('title', 'Reservation')

@push('css')

  <link rel="stylesheet" href="{{ asset('backend/dataTables.bootstrap4.min.css')}}">

@endpush

@section('content')

  <div class="content">
          <div class="container-fluid">
            <div class="row">

              <div class="col-md-12">


                @include('layouts.include.msg')


                <div class="card">
                  <div class="card-header card-header-danger">
                    <h4 class="card-title ">All Reservation</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="data-Table" class="table table-striped table-bordered">
                        <thead class=" text-primary">
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone No</th>
                          <th>Date & Time</th>
                          <th>Message</th>
                          <th>Status</th>
                          <th>Created At</th>
                          <th>Action</th>
                        </thead>
                        <tbody>


                          @foreach($reservations as $key=> $reservation)

                            <tr>
                              <td>{{ $key + 1}}</td>
                              <td>{{ $reservation->name }}</td>
                              <td>{{ $reservation->email }}</td>
                              <td>{{ $reservation->phone_no }}</td>
                              <td>{{ $reservation->date_and_time }}</td>
                              <td>{{ $reservation->message }}</td>
                              <td>
								{{-- {{ $reservation->status == true ? 'Confirmed': 'Not Confirmed Yet?'}} --}}

                              	@if( $reservation->status == true )
                              		<span class="badge badge-info">Confirmed</span>
                              	@else
                              		<span class="badge badge-danger">Not Confirmed Yet?</span>
                              	@endif

                              </td>
                              <td>{{ $reservation->created_at }}</td>
                              <td>

                                @if($reservation->status == false)
									                <form id="status-form-{{ $reservation->id}}" action="{{ route('reservation.status', $reservation->id)}}" method="POST" style="display: none;">

	                                  	@csrf
                                	</form>

		                              <button type="submit" class="btn btn-info btn-sm"
		                              onclick="if(confirm('Are you confirmed this customer by phone?')){
		                                event.preventDefault();
		                                document.getElementById('status-form-{{ $reservation->id }}').submit();
		                              }else{
		                                event.preventDefault();
		                              }
		                              "><i class="material-icons">done</i></button>

                                @endif

                                <form id="delete-form-{{ $reservation->id}}" action="{{ route('reservation.destory', $reservation->id)}}" method="POST" style="display: none;">

                                  @csrf
                                  @method('DELETE')
                                </form>

                                  <button type="submit" class="btn btn-danger btn-sm"
                                  onclick="if(confirm('You want delete this data, Sure?')){
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $reservation->id }}').submit();
                                  }else{
                                    event.preventDefault();
                                  }
                                  "><i class="material-icons">delete</i></button>

                              </td>
                            </tr>

                          @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
  </div>

@endsection

@push('scripts')

  <script src="{{ asset('backend/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('backend/dataTables.bootstrap4.min.js') }}"></script>
 <script>

    $(document).ready( function () {
    $('#data-Table').DataTable();
    });

  </script>

@endpush
