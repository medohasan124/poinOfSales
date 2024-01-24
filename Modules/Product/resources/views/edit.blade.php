@extends('layout.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@lang('Product')</h1>
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
              <h3 class="card-title">@lang('addproduct')</h3>

                @if($errors->any())
                <div class='alert alert-danger'>
                    @foreach($errors->all() as $err)
                            <p>{{$err}}</p>
                    @endforeach
                </div>
                @endif

            </div>
                <div class="card-body">
                    <form action='{{route("product.update" , $data->id)}}' method='POST'>
                        @method('PUT')
                        {{ csrf_field() }}
                        <div class='row'>
                            <div class='col-4'>
                                <label>@lang('sreialNumber')</label>
                                <input type='text' required autofocus  placeholder='sreialNumber' value='{{$data->sreialNumber}}' name='sreialNumber' class='form-control sreial'>
                            </div>

                            <div class='col-4'>
                                <label>@lang('Name')</label>
                                <input type='text' required placeholder='name' value='{{$data->name}}' name='name' class='form-control'>
                            </div>

                            <div class='col-4'>
                                <label>@lang('Name_en')</label>
                                <input type='text' required placeholder='name_en' value='{{$data->name_en}}' name='name_en' class='form-control'>
                            </div>
                            <div class='col-4'>
                                <label>@lang('description')</label>
                                <input type='text'  placeholder='description' value='{{$data->description}}' name='description' class='form-control'>
                            </div>

                            <div class='col-4'>
                                <label>@lang('first_price')</label>
                                <input type='number' required  placeholder='first_price' value='{{$data->first_price}}' name='first_price' class='form-control'>
                            </div>
                            <div class='col-4'>
                                <label>@lang('last_price')</label>
                                <input type='number' required placeholder='last_price' value='{{$data->last_price}}' name='last_price' class='form-control'>
                            </div>

                            <div class='col-4'>
                                <label>@lang('store')</label>
                                <input type='number' required placeholder='store' value='{{$data->store}}' name='store' class='form-control'>
                            </div>





                            <div class='col-4'>
                                <label>@lang('cat_id')
                                    <button type="button"
                                        class="show-modal-delete"data-toggle="modal" data-target="#addcatigory">
                                        <i class='fa fa-plus border rounded badge-success'></i>
                                      </button>

                                  </label>
                                <select  class='form-control selectCatigory' name='cat_id'  placeholder='cat_id' >
                                    <option class='d-none' value='0'>...</option>
                                    <option>
                                    @foreach($catigoies as $row)
                                    <option
                                    value='{{$row->id}}'
                                    @if($row->id == $data->cat_id)
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
                                <button class='btn btn-success form-control'>@lang('update') <i class='fa fa-tags'></i></button>
                            </div>
                        </div>

                    </form>
                    @include("product::modal.addcatigory") ;
                </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
@endsection

@push('js')
<script>
</script>
@endpush
