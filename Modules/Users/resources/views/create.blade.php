@extends('layout.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
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
                    <form action='{{route("users.store")}}' method='POST'>
                        {{ csrf_field() }}
                        <div class='row'>
                            <div class='col-4'>
                                <label>@lang('Name')</label>
                                <input type='text' placeholder='name' value='{{old('name')}}' name='name' class='form-control'>
                            </div>

                            <div class='col-4'>
                                <label>@lang('Email')</label>
                                <input type='Email'  placeholder='email' value='{{old('email')}}' name='email'  class='form-control'>
                            </div>
                            <div class='col-4'>
                                <label>@lang('Mobile')</label>
                                <input type='number' placeholder='mobile' value='{{old('mobile')}}' class='form-control' name='mobile'>
                            </div>
                            <div class='col-4'>
                                <label>@lang('Password')</label>
                                <input type='password'  placeholder='password' value='{{old('password')}}' name='password'  class='form-control'>
                            </div>

                            <div class='col-4'>
                                <label>@lang('Role')</label>
                                <select  class='form-control' name='role' selected=' {{old('role')}}'  placeholder='role' >
                                    <option class='d-none' value='0'>...</option>
                                    <option>
                                    @foreach($role as $row)
                                    <option
                                    value='{{$row->id}}'
                                    @if($row->id == old('role'))
                                    selected
                                    @endif
                                    >

                                        {{$row->name}}
                                    </option>
                                    @endforeach
                                    </option>
                                </select>
                            </div>
                             <div class='col-12 mt-4'>
                                <a href='{{url("users/create")}}'><button class='btn btn-success form-control'>@lang('Add') <i class='fa fa-users'></i></button></a>
                            </div>
                        </div>

                    </form>
                </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
