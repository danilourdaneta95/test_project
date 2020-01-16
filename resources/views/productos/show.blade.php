@extends('layout')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('text.Products') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('Productos') }}">{{ __('text.Home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('text.Show') }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col">
                <div class="card card-border">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('text.ShowProduct') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                @if ($errors->any())
                                  <div class="text-center">
                                      <div class="alert alert-danger alert-dismissible fade show">
                                          <ul>
                                              @foreach ($errors->all() as $error)
                                              <li>{{ $error }}</li>
                                              @endforeach
                                          </ul>
                                      </div>
                                  </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre">{{ __('text.Name') }}:</label>
                                    <p>{{ $producto->nombre }}</p>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="descripcion">{{ __('text.Description') }}:</label>
                                    <p>{{ $producto->descripcion }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="precio">{{ __('text.Price') }}:</label>
                                    <p>{{ $producto->precio }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="descuento">{{ __('text.Discount') }}:</label>
                                    <p>{{ $producto->descuento }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_categoria">{{ __('text.Category') }}:</label>
                                    <p>{{ $producto->categoria->nombre }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="imagen">{{ __('text.Image') }}:</label><br />
                                    @if ($producto->imagen != null)
                                      <img src="{{ asset('storage/'.$producto->imagen ) }}" alt="{{ $producto->nombre }}" style="max-width:100%;" />
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection