@extends('layout.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@lang('User')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">@lang('User')</h3>

              <a href='{{url('users/create')}}'><button class='btn btn-success'>@lang('addUser') <i class='fa fa-users'></i></button></a>
                
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="myTable" class="display text-center">
                    <thead class='text-center'>
                        <tr>
                            <th class='text-center'>#</th>
                            <th class='text-center'>@lang('Name')</th>
                            <th class='text-center'>@lang('Email')</th>
                            <th class='text-center'>@lang('Mobile')</th>
                            <th class='text-center'>@lang('Role')</th>
                            <th class='text-center'>@lang('Date')</th>
                            <th class='text-center'>@lang('Action')</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Users as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->mobile}}</td>
                            <td>
                                @foreach ($row->roles as $role)
                                {{ $role->name }}
                                @endforeach
                            </td>

                            <td>{{$row->updated_at}}</td>

                            <td>
                                <button class='btn btn-primary'>@lang('Edit') <i class='fa fa-edit'></i></button>
                                <button class='btn btn-danger'>@lang('Delete') <i class='fa fa-trash'></i></button>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
    </section>
    <!-- /.content -->
  </div>
@endsection

@push('js')

<!-- dataTable 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>

<script>

$(document).ready( function () {
    $('#myTable').DataTable();
} );
  </script>
@endpush
