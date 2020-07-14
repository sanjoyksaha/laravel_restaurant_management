@extends('layouts.app')

@section('title', 'Item')

@push('css')

  <link rel="stylesheet" href="{{ asset('backend/dataTables.bootstrap4.min.css')}}">

@endpush

@section('content')

  <div class="content">
          <div class="container-fluid">
            <div class="row">

              <div class="col-md-12">
                <a href="{{ route('item.create') }}" class="btn btn-dark">Add New</a>

                @include('layouts.include.msg')


                <div class="card">
                  <div class="card-header card-header-danger">
                    <h4 class="card-title ">All Items</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="data-Table" class="table table-striped table-bordered">
                        <thead class=" text-primary">
                          <th>ID</th>
                          <th>Item Name</th>
                          <th>Image</th>
                          <th>Category</th>
                          <th>Description</th>
                          <th>Price</th>
                          <th>Created At</th>
                          <th>Updated At</th>
                          <th>Action</th>
                        </thead>
                        <tbody>


                          @foreach($items as $key=> $item)

                            <tr>
                              <td>{{ $key + 1}}</td>
                              <td>{{ $item->name}}</td>
                              <td><img src="{{ asset('uploads/items/'.$item->image) }}" alt="" class=" img-fluid img-thumbnail" style="width: 400px; height: 100px;"></td>
                              <td>{{ $item->category->category_name}}</td>
                              <td>{{ $item->description}}</td>
                              <td>{{ $item->price}}</td>
                              <td>{{ $item-> created_at}}</td>
                              <td>{{ $item-> updated_at}}</td>
                              <td>
                                <a href="{{ route('item.edit', $item->id) }}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a> |

                                <form id="delete-form-{{ $item->id}}" action="{{ route('item.destroy', $item->id) }}" method="POST" style="display: none;">

                                  @csrf
                                  @method('DELETE')
                                </form>

                                  <button type="submit" class="btn btn-danger btn-sm"
                                  onclick="if(confirm('You want delete this data, Sure?')){
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $item->id }}').submit();
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
