@extends('layout.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@lang('Products')</h1>
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
              <h3 class="card-title">@lang('product')</h3>

              @if($errors->any())
              <div class='alert alert-danger'>
                  @foreach($errors->all() as $err)
                          <p>{{$err}}</p>
                  @endforeach
              </div>
              @endif
              <a href='{{url('product/create')}}'><button class='btn btn-success'>@lang('add_product') <i class='fa fa-cubes'></i></button></a>

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table id="myTable" class="display text-center">
                    <thead class='text-center'>
                        <tr>
                            <th class='text-center'>#</th>
                            <th class='text-center'>@lang('sreialNumber')</th>
                            <th class='text-center'>@lang('Name')</th>
                            {{-- <th class='text-center'>@lang('Name_en')</th> --}}
                            <th class='text-center'>@lang('description')</th>
                            <th class='text-center'>@lang('first_price')</th>
                            <th class='text-center'>@lang('last_price')</th>
                            <th class='text-center'>@lang('store')</th>
                            <th class='text-center'>@lang('cat_id')</th>
                            <th class='text-center'>@lang('Date')</th>
                            <th class='text-center'>@lang('Action')</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->sreialNumber}}</td>
                            <td>{{$row->name}}</td>
                             {{-- <td>{{$row->name_en}}</td> --}}
                            <td>{{$row->description}}</td>
                            <td class='text-bold'>{{$row->first_price}} $</td>
                            <td class='text-bold'>{{$row->last_price}} $</td>
                            <td>{{$row->store}}</td>
                            <td>{{$row->catigory->name}}</td>
                            <td>{{$row->updated_at}}</td>
                            <td>
                                <div style="width: 183px;">

                                <a
                                href='{{route("product.edit" ,$row->id)}}'
                                class='btn btn-primary block
                                @if(auth()->user()->hasRole('superAdmin') == false)
                                disabled
                                @endif
                                '
                                >@lang('Edit') <i class='fa fa-edit'></i></a>

                                <button type="button" id='{{$row->id}}'
                                    class="btn btn-danger show-modal-delete
                                    @if(auth()->user()->hasRole('superAdmin') == false)
                                    disabled
                                    @endif
                                    "
                                     data-toggle="modal" data-target="#exampleModal">
                                    @lang('Delete')
                                    <i class='fa fa-trash'></i>
                                  </button>
                                  <div>
                            </td>
                        </tr>
                        @endforeach
                         {{-- modal delete product --}}
                         @include('product::modal.deleteModal')

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


<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>

$(document).ready( function () {
    $('#myTable').DataTable({
        "searching": false,
    });
} );

$('.show-modal-delete').click(function(){

    var catId = $(this).attr('id') ;
    var url = "{{ route('product.destroy', ':catId') }}";
    route = url.replace(':catId', catId);

    $('#formDelete').attr('action' , route);
});
  </script>
@endpush
