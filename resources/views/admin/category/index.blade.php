@extends('layouts.app')

@section('title', 'Category')

@push('css')

  <link rel="stylesheet" href="{{ asset('backend/dataTables.bootstrap4.min.css')}}">

@endpush

@section('content')

  <div class="content">
          <div class="container-fluid">
            <div class="row">

              <div class="col-md-12">
                <a href="{{ route('category.create') }}" class="btn btn-dark">Add New</a>

                @include('layouts.include.msg')


                <div class="card">
                  <div class="card-header card-header-danger">
                    <h4 class="card-title ">All Categories</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="data-Table" class="table table-striped table-bordered">
                        <thead class=" text-primary">
                          <th>ID</th>
                          <th>Category Name</th>
                          <th>Slug</th>
                          <th>Created At</th>
                          <th>Updated At</th>
                          <th>Action</th>
                        </thead>
                        <tbody>


                          @foreach($categories as $key=> $category)

                            <tr>
                              <td>{{ $key + 1}}</td>
                              <td>{{ $category-> category_name}}</td>
                              <td>{{ $category-> slug}}</td>
                              <td>{{ $category-> created_at}}</td>
                              <td>{{ $category-> updated_at}}</td>
                              <td>
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a> |

                                <form id="delete-form-{{ $category->id}}" action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: none;">

                                  @csrf
                                  @method('DELETE')
                                </form>

                                  <button type="submit" class="btn btn-danger btn-sm"
                                  onclick="if(confirm('You want delete this data, Sure?')){
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $category->id }}').submit();
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
