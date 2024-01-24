@extends('layout.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Catigory</h1>
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
              <h3 class="card-title">@lang('add_catigory')</h3>

                @if($errors->any())
                <div class='alert alert-danger'>
                    @foreach($errors->all() as $err)
                            <p>{{$err}}</p>
                    @endforeach
                </div>
                @endif

            </div>
                <div class="card-body">
                    <form action='{{route("catigory.update" ,$data->id)}}' method='POST'>
                        {{ csrf_field() }}
                        @method('PUT')
                        <div class='row'>
                            <div class='col-4'>
                                <label>@lang('Name')</label>
                                <input type='text' placeholder='name' value='{{$data->name}}' name='name' class='form-control'>
                            </div>
                            <div class='col-4'>
                                <label>@lang('Name_en')</label>
                                <input type='text' placeholder='name_en' value='{{$data->name_en}}' name='name_en' class='form-control'>
                            </div>

                             <div class='col-12 mt-4'>
                                <a href='{{url("catigory/create")}}'><button class='btn btn-success form-control'>@lang('Update') <i class='fa fa-tags'></i></button></a>
                            </div>
                        </div>

                    </form>
                </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
