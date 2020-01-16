

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
                    <li class="breadcrumb-item active">{{ __('text.Edit') }}</li>
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
                        <h3 class="card-title">{{ __('text.EditProduct') }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('ProductosUpdate') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $producto->id }}">
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
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> {{ __('text.Save') }}</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nombre">{{ __('text.Name') }}:</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $producto->nombre }}">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="descripcion">{{ __('text.Description') }}:</label>
                                        <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ $producto->descripcion }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="precio">{{ __('text.Price') }}:</label>
                                        <input type="text" class="form-control" name="precio" id="precio" value="{{ $producto->precio }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="descuento">{{ __('text.Discount') }}:</label>
                                        <input type="text" class="form-control" name="descuento" id="descuento" value="{{ $producto->descuento }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="id_categoria">{{ __('text.Category') }}:</label>
                                        <select name="id_categoria" id="id_categoria" class="form-control">
                                            @foreach ($categorias as $categoria)
                                              <option value="{{ $categoria->id }}">{{ $categoria->descripcion }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="imagen">{{ __('text.Image') }}:</label><br />
                                        <input type="file" name="imagen" id="imagen" value="{{ old('imagen') }}"><br><br>
                                        @if ($producto->imagen != null)
                                          <img src="{{ asset('storage/'.$producto->imagen ) }}" alt="{{ $producto->nombre }}" style="max-width:100%;" />
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection