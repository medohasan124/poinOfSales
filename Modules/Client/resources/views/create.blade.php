@extends('layout.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@lang('add_client')</h1>
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
              <h3 class="card-title">@lang('addUser')</h3>

                @if($errors->any())
                <div class='alert alert-danger'>
                    @foreach($errors->all() as $err)
                            <p>{{$err}}</p>
                    @endforeach
                </div>
                @endif

            </div>
                <div class="card-body">
                    <form action='{{route("client.store")}}' method='POST'>
                        {{ csrf_field() }}
                        <div class='row'>
                            <div class='col-4'>
                                <label>@lang('Name')</label>
                                <input type='text' placeholder='name' value='{{old('name')}}' name='name' class='form-control'>
                            </div>
                            <div class='col-4'>
                                <label>@lang('Mobile')</label>
                                <input type='text' placeholder='mobile' value='{{old('mobile')}}' name='mobile' class='form-control'>
                            </div>


                             <div class='col-12 mt-4'>
                                <a href='{{url("client/create")}}'><button class='btn btn-success form-control'>@lang('Add') <i class='fa fa-tags'></i></button></a>
                            </div>
                        </div>

                    </form>
                </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
