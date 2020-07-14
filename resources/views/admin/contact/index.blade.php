@extends('layouts.app')

@section('title', 'Contact')

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
                    <h4 class="card-title ">All Contacts Message</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="data-Table" class="table table-striped table-bordered">
                        <thead class=" text-primary">
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Subject</th>
                          <th>Send At</th>
                          <th>Action</th>
                        </thead>
                        <tbody>


                          @foreach($contact as $key=> $contacts)

                            <tr>
                              <td>{{ $key + 1}}</td>
                              <td>{{ $contacts->name }}</td>
                              <td>{{ $contacts->email }}</td>
                              <td>{{ $contacts->subject }}</td>
                              <td>{{ $contacts->created_at }}</td>
                              <td>

                                <a href="{{ route('contact.show', $contacts->id) }}" class="btn btn-info btn-sm"><i class="material-icons">details</i></a>

                                <form id="delete-form-{{ $contacts->id}}" action="{{ route('contact.destroy', $contacts->id)}}" method="POST" style="display: none;">

                                  @csrf
                                  @method('DELETE')
                                </form>

                                  <button type="submit" class="btn btn-danger btn-sm"
                                  onclick="if(confirm('You want delete this data, Sure?')){
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $contacts->id }}').submit();
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
